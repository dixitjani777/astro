<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogsController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityLog::query()->latest();
        if ($request->filled('q')) {
            $q = $request->string('q');
            $query->where('path', 'like', "%{$q}%")->orWhere('action', 'like', "%{$q}%");
        }

        return view('admin.activity.index', [
            'logs' => $query->paginate(50)->withQueryString(),
        ]);
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        ActivityLog::query()->whereIn('id', $data['ids'])->delete();
        return redirect()->route('admin.activity.index')->with('status', 'Selected activity logs deleted.');
    }
}
