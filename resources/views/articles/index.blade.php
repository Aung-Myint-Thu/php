@extends("layouts.app")
@section("content")


<div class="container">
    @if (session("info"))
    <div class="alert alert-danger">
        {{session("info")}}
    </div>

    @endif

    @if (session("add"))
    <div  class="alert alert-info">
        {{session("add")}}
    </div>

    @endif

    {{$articles->links()}}
    @foreach ($articles as $article )

    <div class="card mt-2 p-2">
        <div class="card-body mb-2">
            <h4 class="card-title"> {{$article->title}} </h4>
            <div class="card-subtitle text-muted"> {{$article->created_at->diffForHumans()}} </div>
            User: <b>{{$article->user->name}}</b>
            Category: <b> {{$article->category->name}} </b>
            <b> Comment ({{count($article->comments)}}) </b>
        </div>
        <p class="card-text"> {{$article->body}} </p>
        <a href="{{url("/articles/detail/$article->id")}}"
            class="card-link"> View Detail &rsaquo; </a>
    </div>

    @endforeach
</div>

@endsection
