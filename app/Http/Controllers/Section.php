<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\CmsPage;
use Illuminate\Http\Request;

class Section extends Controller
{
    private function cmsPageOrFallbackView(string $slug, string $fallbackView, array $data = [])
    {
        $page = CmsPage::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->first();

        if ($page) {
            return view('frontend.cms.page', array_merge($data, [
                'page' => $page,
            ]));
        }

        return view($fallbackView, $data);
    }

    public function teamwork(){
        return $this->cmsPageOrFallbackView('teamwork', 'frontend/section/teamwork');
    }

    public function donate(){
        return $this->cmsPageOrFallbackView('donate', 'frontend/section/donate');
    }

    public function contact(){
        return $this->cmsPageOrFallbackView('contact', 'frontend/section/contact');
	}

    public function about(){
		return $this->cmsPageOrFallbackView('about', 'frontend/section/about');
	}

    public function blogs(){
        $posts = BlogPost::query()
            ->latest('published_at')
            ->latest()
            ->paginate(12);

        return view('frontend/section/blogs', [
            'posts' => $posts,
        ]);
    }

    public function readblog(BlogPost $post){
        return view('frontend/section/readblog', [
            'post' => $post,
        ]);
    }

    public function teamactivity(){
        return $this->cmsPageOrFallbackView('teamactivity', 'frontend/section/teamactivity');
    }

    public function disclaimer(){
        return $this->cmsPageOrFallbackView('disclaimer', 'frontend/section/disclaimer');
    }

    public function feedback(){
        return $this->cmsPageOrFallbackView('feedback', 'frontend/section/feedback');
    }

    public function payment(){
        return $this->cmsPageOrFallbackView('payment', 'frontend/section/payment');
    }

    public function privacy(){
        return $this->cmsPageOrFallbackView('privacy', 'frontend/section/privacy');
    }

    public function terms(){
        return $this->cmsPageOrFallbackView('terms', 'frontend/section/terms');
    }

    public function page(string $slug)
    {
        $page = CmsPage::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('frontend.cms.page', [
            'page' => $page,
        ]);
    }
    
}

?>
