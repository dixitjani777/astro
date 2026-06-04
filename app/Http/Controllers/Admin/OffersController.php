<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OffersController extends Controller
{
    public function index(Request $request)
    {
        $query = Offer::query()->latest();
        if ($request->filled('q')) {
            $q = $request->string('q');
            $query->where('title', 'like', "%{$q}%")->orWhere('link_url', 'like', "%{$q}%");
        }

        return view('admin.offers.index', [
            'offers' => $query->orderBy('sort_order')->paginate(25)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.offers.form', [
            'offer' => new Offer(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:200'],
            'link_url' => ['nullable', 'url', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'image' => ['required', 'image', 'max:1024'],
        ]);

        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['image_path'] = $this->storeImage($request, 'offers');

        Offer::create($data);
        Cache::forget('frontend.offers.active');
        return redirect()->route('admin.offers.index')->with('status', 'Offer created.');
    }

    public function edit(Offer $offer)
    {
        return view('admin.offers.form', [
            'offer' => $offer,
        ]);
    }

    public function update(Request $request, Offer $offer)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:200'],
            'link_url' => ['nullable', 'url', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'image' => ['nullable', 'image', 'max:1024'],
        ]);

        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeImage($request, 'offers');
        }

        $offer->update($data);
        Cache::forget('frontend.offers.active');
        return redirect()->route('admin.offers.index')->with('status', 'Offer updated.');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        Cache::forget('frontend.offers.active');
        return redirect()->route('admin.offers.index')->with('status', 'Offer deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        Offer::query()->whereIn('id', $data['ids'])->get()->each->delete();
        Cache::forget('frontend.offers.active');

        return redirect()->route('admin.offers.index')->with('status', 'Selected offers deleted.');
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
