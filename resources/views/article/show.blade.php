@extends('layouts.app')

@section('content')
    <h1>{{$articleItem->name}}</h1>
    <div>{{$articleItem->body}}</div>
@endsection
