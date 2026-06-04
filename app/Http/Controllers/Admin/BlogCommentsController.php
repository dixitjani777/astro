<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentsController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogComment::query()->with('post')->latest();
        if ($request->filled('approved')) {
            $query->where('is_approved', (bool) $request->boolean('approved'));
        }

        return view('admin.blog.comments.index', [
            'comments' => $query->paginate(25)->withQueryString(),
        ]);
    }

    public function approve(BlogComment $comment)
    {
        $comment->is_approved = true;
        $comment->save();
        return back()->with('status', 'Comment approved.');
    }

    public function destroy(BlogComment $comment)
    {
        $comment->delete();
        return back()->with('status', 'Comment deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer', 'distinct'],
        ]);

        BlogComment::query()->whereIn('id', $data['ids'])->get()->each->delete();
        return back()->with('status', 'Selected comments deleted.');
    }
}
