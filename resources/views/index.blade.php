@extends('layouts.app')
@section('content')
<h2>Hello!!</h2>
<p>
    You can see all tasks <a href="{{route('tasks_index')}}">click here</a>
</p>
<p>
    You can see all news <a href="{{route('news_index')}}">click here</a>
</p>
@endsection