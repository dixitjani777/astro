<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\FrontendTheme;

class Query extends Controller
{
    public function index(){
        return app(FrontendTheme::class)->view(
            'frontend.themes.light.query.index',
            'frontend/query/query'
        );
    }

}
