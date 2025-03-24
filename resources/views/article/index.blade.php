@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
    <h2><a href="{{route('articles.create')}}">Создать статью</a></h2>

    @foreach ($articles as $article)
        <h2><a href="{{route('articles.show',['article'=>$article],false)}}">{{$article->name}}</a>
            <span><a href="{{ route('articles.edit', $article) }}">Изменить</a></span>
            <span><a href="{{ route('articles.destroy', $article) }}" data-confirm="Вы уверены?"
                     data-method="delete" rel="nofollow">Удалить</a></span>
        </h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    <div>{{$articles->links()}}</div>

@endsection
