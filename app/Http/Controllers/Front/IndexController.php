<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{
    public function index()
    {
        $articles = Article::all(App::getLocale()); // App::getLocale() მიმდინარე ენა

        return view('front.index', compact('articles'));
    }

    public function article($id)
    {
        $article = Article::item(App::getLocale(), $id);

        if(!$article) {
            return redirect()->back();
        }

        return view('front.article', compact('article'));
    }
}
