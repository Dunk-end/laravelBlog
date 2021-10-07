<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRedactionRequest;
use App\Http\Requests\NewsRequest;
use App\Models\Categories;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function News(NewsRequest $req)
    {

        if (NewsService::storeNews($req->all())) {
            return redirect()->back()->with('success', 'Новость успешно добавлена!');
        }

        return redirect()->back()->with('error', 'Фото не выбрано!');
    }

    public function RedactionNews(Request $req) {
        $id = $req->get('id');
        $news = new News;
        $new  = $news->find($id);

        return view('admin.admin', [
            'new' => $new,
        ]);
    }

    public function RedactionUserNews(Request $req) {
        $id = $req->get('id');
        $news = new News;
        $new  = $news->find($id);

        return view('redaction_news', [
            'new' => $new,
        ]);
    }

    public function Redact(NewsRedactionRequest $req)
    {
        if (NewsService::updateNews($req->all())) {

            return redirect()->back()->with('success', 'Новость успешно изменена!');
        }

        return redirect()->back()->with('error', 'Фото не выбрано!');
    }

    public function DeleteNews(Request $req)
    {
        $id = $req->get('id');

        News::where('id', $id)
            ->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена!');
    }

    public function add_posts()
    {

        return view('append_news', [
            'categories' => Categories::get(),
        ]);
    }

    public function show($id)
    {

        return view('posts', [
            'news' => News::findOrFail($id)
        ]);
    }

    public function back(Request $req)
    {
        $user = Auth::user();
        if(!empty($user)) {
            $roles = $user->getRoleNames();
            if ($roles['0'] === 'admin') {

                return redirect()->route('admins');
            }
        }

        return redirect()->route('home');
    }
}
