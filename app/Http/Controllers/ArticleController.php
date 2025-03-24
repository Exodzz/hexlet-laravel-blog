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

    /**
     * Создание записи
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    /**
     * Возврат после создания
     */
    public function store(Request $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы

        $data = $request->validate([
            'name' => 'required|unique:articles',
            'body' => 'required|min:1000',

        ]);

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($data);
        // При ошибках сохранения возникнет исключение
        $article->save();

        // Редирект на указанный маршрут
        return redirect()
            ->route('article.index');
    }
    //Запрос формы
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    //Обновление записи
    public function update(Request $request, int $id)
    {
        $article = Article::findOrFail($id);
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
            ->route('article.index');
    }

    public function destroy(int $id)
    {
        Article::findOrFail($id)->delete();
        return redirect()
            ->route('article.index');
    }
}
