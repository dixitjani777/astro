<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query()->latest();

        if ($request->filled('id')) {
            $query->where('id', (int) $request->input('id'));
        }

        if ($request->filled('name')) {
            $name = $request->string('name');
            $query->where('name', 'like', "%{$name}%");
        }

        if ($request->filled('email')) {
            $email = $request->string('email');
            $query->where('email', 'like', "%{$email}%");
        }

        if ($request->filled('role')) {
            $query->where('role', $request->string('role'));
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date('date_from'));
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date('date_to'));
        }

        if ($request->string('export')->lower() === 'csv') {
            return response()->streamDownload(function () use ($query) {
                $out = fopen('php://output', 'w');
                fwrite($out, "\xEF\xBB\xBF");
                fputcsv($out, ['ID', 'Name', 'Email', 'Mobile', 'Role', 'Created At']);
                $query->chunk(500, function ($rows) use ($out) {
                    foreach ($rows as $u) {
                        fputcsv($out, [$u->id, $u->name, $u->email, $u->mobile, $u->role, optional($u->created_at)->toDateTimeString()]);
                    }
                });
                fclose($out);
            }, 'users.csv', ['Content-Type' => 'text/csv; charset=UTF-8']);
        }

        return view('admin.users.index', [
            'users' => $query->paginate(25)->withQueryString(),
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.users.form', [
            'user' => new User(),
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'mobile' => ['nullable', 'string', 'max:32'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
            'role' => ['required', 'string', 'max:50'],
            'priority' => ['nullable', 'string', 'in:low,medium,important'],
            'is_blocked' => ['nullable', 'boolean'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => strtolower($data['email']),
            'mobile' => $this->normalizeMobile($data['mobile'] ?? null),
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'priority' => $data['priority'] ?? null,
            'is_blocked' => (bool) ($data['is_blocked'] ?? false),
        ]);

        return redirect()->route('admin.users.index')->with('status', 'User created.');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', [
            'user' => $user,
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'mobile' => ['nullable', 'string', 'max:32'],
            'password' => ['nullable', 'string', 'min:6', 'max:255'],
            'role' => ['required', 'string', 'max:50'],
            'priority' => ['nullable', 'string', 'in:low,medium,important'],
            'is_blocked' => ['nullable', 'boolean'],
        ]);

        $user->name = $data['name'];
        $user->email = strtolower($data['email']);
        $user->mobile = $this->normalizeMobile($data['mobile'] ?? null);
        $user->role = $data['role'];
        $user->priority = $data['priority'] ?? null;
        $user->is_blocked = (bool) ($data['is_blocked'] ?? false);
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        return redirect()->route('admin.users.index')->with('status', 'User updated.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->withErrors(['You cannot delete your own account.']);
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('status', 'User deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        $ids = collect($data['ids'])->map(fn ($v) => (int) $v)->unique()->values();
        $selfId = (int) auth()->id();
        $skippedSelf = $ids->contains($selfId);
        $ids = $ids->reject(fn ($id) => $id === $selfId)->values();

        if ($ids->isNotEmpty()) {
            User::query()->whereIn('id', $ids)->get()->each->delete();
        }

        $msg = 'Selected users deleted.';
        if ($skippedSelf) {
            $msg .= ' (Skipped your own account)';
        }

        return redirect()->route('admin.users.index')->with('status', $msg);
    }

    public function updatePriority(Request $request, User $user)
    {
        $data = $request->validate([
            'priority' => ['nullable', 'string', 'in:low,medium,important'],
        ]);

        $user->update(['priority' => $data['priority'] ?? null]);

        return back()->with('status', 'User priority updated.');
    }

    public function toggleBlock(User $user)
    {
        $user->is_blocked = ! $user->is_blocked;
        $user->save();

        return back()->with('status', $user->is_blocked ? 'User blocked.' : 'User unblocked.');
    }

    private function normalizeMobile(?string $mobile): ?string
    {
        $mobile = trim((string) $mobile);

        if ($mobile === '') {
            return null;
        }

        $mobile = preg_replace('/[^\d+]/', '', $mobile);

        return $mobile !== '' ? $mobile : null;
    }
}
