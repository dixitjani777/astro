<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\CmsPage;
use App\Models\Enquiry;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'enquiriesToday' => Enquiry::whereDate('created_at', today())->count(),
            'enquiriesTotal' => Enquiry::count(),
            'usersTotal' => User::count(),
            'pagesTotal' => CmsPage::count(),
            'postsTotal' => BlogPost::count(),
        ]);
    }
}
