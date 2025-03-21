@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{html()->modelForm($article,"PATCH",route('article.update',$article))->open()}}
   @include('article.form')
    {{html()->submit('Обновить')}}
{{html()->closeModelForm()}}
