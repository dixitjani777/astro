<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdBanner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdBannersController extends Controller
{
    public function index(Request $request)
    {
        $query = AdBanner::query()->latest();
        if ($request->filled('q')) {
            $q = $request->string('q');
            $query->where('title', 'like', "%{$q}%")
                ->orWhere('placement', 'like', "%{$q}%")
                ->orWhere('link_url', 'like', "%{$q}%");
        }

        return view('admin.ad-banners.index', [
            'banners' => $query->orderBy('placement')->orderBy('sort_order')->paginate(25)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.ad-banners.form', [
            'banner' => new AdBanner(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:200'],
            'placement' => ['required', 'string', 'max:50'],
            'content_type' => ['required', 'string', Rule::in(['image', 'html', 'youtube'])],
            'link_url' => ['nullable', 'url', 'max:2000'],
            'embed_html' => ['nullable', 'string', 'max:100000', 'required_if:content_type,html'],
            'youtube_url' => ['nullable', 'url', 'max:2000', 'required_if:content_type,youtube'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'image' => ['nullable', 'image', 'max:1024', 'required_if:content_type,image'],
        ]);

        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        if (($data['content_type'] ?? 'image') === 'image') {
            $data['image_path'] = $this->storeImage($request, 'banners');
        } else {
            $data['image_path'] = null;
            $data['link_url'] = null;
        }

        AdBanner::create($data);
        Cache::forget('frontend.ad_banners.sidebar');
        Cache::forget('frontend.ad_banners.query_sidebar');
        Cache::forget('frontend.ad_banners.by_placement');
        return redirect()->route('admin.ad-banners.index')->with('status', 'Banner created.');
    }

    public function edit(AdBanner $ad_banner)
    {
        return view('admin.ad-banners.form', [
            'banner' => $ad_banner,
        ]);
    }

    public function update(Request $request, AdBanner $ad_banner)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:200'],
            'placement' => ['required', 'string', 'max:50'],
            'content_type' => ['required', 'string', Rule::in(['image', 'html', 'youtube'])],
            'link_url' => ['nullable', 'url', 'max:2000'],
            'embed_html' => ['nullable', 'string', 'max:100000', 'required_if:content_type,html'],
            'youtube_url' => ['nullable', 'url', 'max:2000', 'required_if:content_type,youtube'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'image' => ['nullable', 'image', 'max:1024', 'required_if:content_type,image'],
        ]);

        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        if (($data['content_type'] ?? 'image') === 'image') {
            $data['embed_html'] = null;
            $data['youtube_url'] = null;

            if ($request->hasFile('image')) {
                $data['image_path'] = $this->storeImage($request, 'banners');
            }
        } elseif (($data['content_type'] ?? '') === 'html') {
            $data['image_path'] = null;
            $data['youtube_url'] = null;
            $data['link_url'] = null;
        } else { // youtube
            $data['image_path'] = null;
            $data['embed_html'] = null;
            $data['link_url'] = null;
        }

        $ad_banner->update($data);
        Cache::forget('frontend.ad_banners.sidebar');
        Cache::forget('frontend.ad_banners.query_sidebar');
        Cache::forget('frontend.ad_banners.by_placement');
        return redirect()->route('admin.ad-banners.index')->with('status', 'Banner updated.');
    }

    public function destroy(AdBanner $ad_banner)
    {
        $ad_banner->delete();
        Cache::forget('frontend.ad_banners.sidebar');
        Cache::forget('frontend.ad_banners.query_sidebar');
        Cache::forget('frontend.ad_banners.by_placement');
        return redirect()->route('admin.ad-banners.index')->with('status', 'Banner deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        AdBanner::query()->whereIn('id', $data['ids'])->get()->each->delete();
        Cache::forget('frontend.ad_banners.sidebar');
        Cache::forget('frontend.ad_banners.query_sidebar');
        Cache::forget('frontend.ad_banners.by_placement');

        return redirect()->route('admin.ad-banners.index')->with('status', 'Selected banners deleted.');
    }

    private function storeImage(Request $request, string $folder): string
    {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension() ?: 'jpg';
        $filename = Str::uuid() . '.' . $ext;
        $relativeDir = "uploads/{$folder}";

        File::ensureDirectoryExists(public_path($relativeDir));
        $file->move(public_path($relativeDir), $filename);

        return "{$relativeDir}/{$filename}";
    }
}
