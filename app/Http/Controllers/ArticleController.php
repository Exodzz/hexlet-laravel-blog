<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Список статей
     */
    public function index()
    {
        $articles = Article::paginate(2);
        return view('article.index', compact('articles'));
    }

    /**
     * Статья Детальная
     */
    public function show(int $id)
    {
        $articleItem = Article::findOrFail($id);
        return view('article.show', compact('articleItem'));
    }
}
