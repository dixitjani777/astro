<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HomeSlidersController extends Controller
{
    public function index(Request $request)
    {
        $query = HomeSlider::query()->orderBy('sort_order')->orderByDesc('id');

        if ($request->filled('q')) {
            $q = $request->string('q')->toString();
            $query->where('title', 'like', "%{$q}%");
        }

        return view('admin.home-sliders.index', [
            'slides' => $query->paginate(25)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.home-sliders.form', [
            'slide' => new HomeSlider(['is_active' => true, 'sort_order' => 0, 'button_text' => 'Check it out']),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, isUpdate: false);
        $data['image_path'] = $this->storeImage($request);

        HomeSlider::create($data);
        Cache::forget('frontend.home_sliders.active');

        return redirect()->route('admin.home-sliders.index')->with('status', 'Slide created.');
    }

    public function edit(HomeSlider $home_slider)
    {
        return view('admin.home-sliders.form', [
            'slide' => $home_slider,
        ]);
    }

    public function update(Request $request, HomeSlider $home_slider)
    {
        $data = $this->validated($request, isUpdate: true);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeImage($request);
        }

        $home_slider->update($data);
        Cache::forget('frontend.home_sliders.active');

        return redirect()->route('admin.home-sliders.index')->with('status', 'Slide updated.');
    }

    public function destroy(HomeSlider $home_slider)
    {
        $home_slider->delete();
        Cache::forget('frontend.home_sliders.active');

        return redirect()->route('admin.home-sliders.index')->with('status', 'Slide deleted.');
    }

    private function validated(Request $request, bool $isUpdate): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:200'],
            'subtitle' => ['nullable', 'string', 'max:2000'],
            'button_text' => ['nullable', 'string', 'max:80'],
            'button_url' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:1000000'],
            'is_active' => ['nullable', 'boolean'],
        ];

        if (!$isUpdate) {
            $rules['image'] = ['required', 'image', 'max:1024'];
        } else {
            $rules['image'] = ['nullable', 'image', 'max:1024'];
        }

        $data = $request->validate($rules);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        return $data;
    }

    private function storeImage(Request $request): string
    {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension() ?: 'jpg';
        $filename = Str::uuid() . '.' . $ext;
        $relativeDir = 'uploads/home-sliders';

        File::ensureDirectoryExists(public_path($relativeDir));
        $file->move(public_path($relativeDir), $filename);

        return "{$relativeDir}/{$filename}";
    }
}
