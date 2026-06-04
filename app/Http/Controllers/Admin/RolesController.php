<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class RolesController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::orderBy('name')->paginate(25),
        ]);
    }

    public function create()
    {
        return view('admin.roles.form', [
            'role' => new Role(),
            'permissions' => Permission::orderBy('group')->orderBy('name')->get()->groupBy(fn ($p) => $p->group ?: 'Other'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['nullable', 'string', 'max:50', 'unique:roles,slug', 'not_in:user'],
            'description' => ['nullable', 'string', 'max:255'],
            'permission_ids' => ['nullable', 'array'],
            'permission_ids.*' => ['integer', 'exists:permissions,id'],
        ]);

        $slug = $data['slug'] ?: Str::slug($data['name']);

        $role = Role::create([
            'name' => $data['name'],
            'slug' => $slug,
            'description' => $data['description'] ?? null,
        ]);

        if ($role->slug === 'admin') {
            $role->permissions()->sync(Permission::pluck('id')->all());
        } else {
            $role->permissions()->sync($data['permission_ids'] ?? []);
        }

        Cache::forget("roles.by_slug.{$role->slug}");
        return redirect()->route('admin.roles.index')->with('status', 'Role created.');
    }

    public function edit(Role $role)
    {
        $role->load('permissions');

        return view('admin.roles.form', [
            'role' => $role,
            'permissions' => Permission::orderBy('group')->orderBy('name')->get()->groupBy(fn ($p) => $p->group ?: 'Other'),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:50', 'unique:roles,slug,' . $role->id, 'not_in:user'],
            'description' => ['nullable', 'string', 'max:255'],
            'permission_ids' => ['nullable', 'array'],
            'permission_ids.*' => ['integer', 'exists:permissions,id'],
        ]);

        $role->update($data);

        if ($role->slug === 'admin') {
            $role->permissions()->sync(Permission::pluck('id')->all());
        } else {
            $role->permissions()->sync($data['permission_ids'] ?? []);
        }

        Cache::forget("roles.by_slug.{$role->slug}");
        return redirect()->route('admin.roles.index')->with('status', 'Role updated.');
    }

    public function destroy(Role $role)
    {
        if ($role->slug === 'admin') {
            return back()->withErrors(['The admin role cannot be deleted.']);
        }
        $role->delete();
        Cache::forget("roles.by_slug.{$role->slug}");
        return redirect()->route('admin.roles.index')->with('status', 'Role deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        $roles = Role::query()->whereIn('id', $data['ids'])->get();
        $deleted = 0;
        $skipped = [];

        foreach ($roles as $role) {
            if ($role->slug === 'admin') {
                $skipped[] = 'admin';
                continue;
            }

            if (User::query()->where('role', $role->slug)->exists()) {
                $skipped[] = $role->slug . ' (in use)';
                continue;
            }

            $role->delete();
            Cache::forget("roles.by_slug.{$role->slug}");
            $deleted++;
        }

        $msg = "{$deleted} role(s) deleted.";
        if (!empty($skipped)) {
            $msg .= ' Skipped: ' . implode(', ', array_unique($skipped)) . '.';
        }

        return redirect()->route('admin.roles.index')->with('status', $msg);
    }
}
