<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('published', true)->orderBy('created_at', 'desc');

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        $articles = $query->paginate(5);

        return view('home', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::where('published', true)->findOrFail($id);
        $nextArticle = $article->getNextArticle();
        $previousArticle = $article->getPreviousArticle();

        return view('article', compact('article', 'nextArticle', 'previousArticle'));
    }

    public function profile()
    {
        return view('profile');
    }
}