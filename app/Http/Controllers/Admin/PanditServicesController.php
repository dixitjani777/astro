<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PanditService;
use Illuminate\Http\Request;

class PanditServicesController extends Controller
{
    public function index(Request $request)
    {
        $query = PanditService::query()->orderBy('sort_order')->orderBy('title');

        if ($request->filled('q')) {
            $q = $request->string('q')->toString();
            $query->where('title', 'like', "%{$q}%");
        }

        return view('admin.pandit-services.index', [
            'services' => $query->paginate(25)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.pandit-services.form', ['service' => new PanditService(['is_active' => true, 'sort_order' => 0])]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        PanditService::create($data);

        return redirect()->route('admin.pandit-services.index')->with('status', 'Service created.');
    }

    public function edit(PanditService $pandit_service)
    {
        return view('admin.pandit-services.form', ['service' => $pandit_service]);
    }

    public function update(Request $request, PanditService $pandit_service)
    {
        $data = $this->validated($request);
        $pandit_service->update($data);

        return redirect()->route('admin.pandit-services.index')->with('status', 'Service updated.');
    }

    public function destroy(PanditService $pandit_service)
    {
        $pandit_service->delete();
        return redirect()->route('admin.pandit-services.index')->with('status', 'Service deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'short_text' => ['nullable', 'string', 'max:2000'],
            'image_path' => ['nullable', 'string', 'max:500'],
            'link_url' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:1000000'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        return $data;
    }
}

