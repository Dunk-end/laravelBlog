<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $news = News::get();

        return view('admin.home', [
            'news' => $news,
        ]);
    }

    public function admins() {
        $categories = Categories::orderBy('id')->get();

        return view('admin.admin', [
            'categories' => $categories,
        ]);
    }
}
