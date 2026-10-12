<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Support\FrontendTheme;
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
          return app(FrontendTheme::class)->view('frontend.themes.light.contact.index', 'frontend/section/contact');
	}

    public function about(){
		return $this->cmsPageOrFallbackView('about', 'frontend/section/about');
	}

    public function blogs(){
        $posts = BlogPost::query()
            ->latest('published_at')
            ->latest()
            ->paginate(12);

          return app(FrontendTheme::class)->view('frontend.themes.light.blog.index', 'frontend/section/blogs', [
            'posts' => $posts,
        ]);
    }

    public function readblog(BlogPost $post){
          return app(FrontendTheme::class)->view('frontend.themes.light.blog.show', 'frontend/section/readblog', [
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
        $page = CmsPage::query()
            ->where('slug', 'feedback')
            ->where('is_published', true)
            ->first();

        if ($page) {
            return view('frontend.cms.page', ['page' => $page]);
        }

        return app(FrontendTheme::class)->view('frontend.themes.light.feedback.index', 'frontend/section/feedback');
    }

    public function payment(){
        return $this->cmsPageOrFallbackView('payment', 'frontend/section/payment');
    }

    public function privacy(){
        $page = CmsPage::query()
            ->where('slug', 'privacy')
            ->where('is_published', true)
            ->first();

        if ($page) {
            return app(FrontendTheme::class)->view('frontend.themes.light.cms.page', 'frontend.cms.page', [
                'page' => $page,
            ]);
        }

        return app(FrontendTheme::class)->view('frontend.themes.light.legal.privacy', 'frontend/section/privacy');
    }

    public function terms(){
        $page = CmsPage::query()
            ->where('slug', 'terms')
            ->where('is_published', true)
            ->first();

        if ($page) {
            return app(FrontendTheme::class)->view('frontend.themes.light.cms.page', 'frontend.cms.page', [
                'page' => $page,
            ]);
        }

        return app(FrontendTheme::class)->view('frontend.themes.light.legal.terms', 'frontend/section/terms');
    }

    public function page(string $slug)
    {
        $page = CmsPage::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

          return app(FrontendTheme::class)->view('frontend.themes.light.cms.page', 'frontend.cms.page', [
            'page' => $page,
        ]);
    }
    
}

?>
