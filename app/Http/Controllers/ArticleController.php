<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы

        $data = $request->validate([
            'name' => 'required|unique:articles',
            'body' => 'required|min:10',

        ]);

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($data);
        // При ошибках сохранения возникнет исключение
        $article->save();

        // Редирект на указанный маршрут
        return redirect()
            ->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = Article::findOrFail($article->id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $article = Article::findOrFail($article->id);
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article = Article::findOrFail($article->id);
        $data = $request->validate([
            // У обновления немного измененная валидация
            // В проверку уникальности добавляется название поля и id текущего объекта
            // Если этого не сделать, Laravel будет ругаться, что имя уже существует
            'name' => "required|unique:articles,name,{$article->id}",
            'body' => 'required|min:100',
        ]);

        $article->fill($data);
        $article->save();
        return redirect()
            ->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Article::findOrFail($article->id)->delete();
        return redirect()
            ->route('articles.index');
    }
}
