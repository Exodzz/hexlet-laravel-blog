@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{html()->modelForm($article,"POST",route('articles.store'))->open()}}
    {{html()->label('Имя')}}
    {{html()->input('text','name')}}
    {{html()->label('Статья')}}
    {{html()->textarea('body')}}
    {{html()->submit('Создать')}}
{{html()->closeModelForm()}}
