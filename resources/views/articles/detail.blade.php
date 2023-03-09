@extends("layouts.app")
@section("content")
<div class="container">
    @if (session("add"))
    <div  class="alert alert-info">
        {{session("add")}}
    </div>

    @endif
    @if (session("info"))
    <div class="alert alert-danger">
        {{session("info")}}
    </div>

    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error )
    <div class="alert alert-warning">
        {{$error}}
    </div>
    @endforeach



    @endif

    <div class="card mt-2 p-2">
        <div class="card-body mb-2">
            <h4 class="card-title"> {{$article->title}} </h4>
            <div class="card-subtitle text-muted"> {{$article->created_at->diffForHumans()}} </div>
            Category: <b> {{$article->category->name}} </b>
            <p class="card-text"> {{$article->body}} </p>
            @auth
            <a href="{{url("/articles/delete/$article->id")}}" class="btn btn-danger">Delete</a>
            <a href="{{url("/articles/edit/$article->id")}}" class="btn btn-success">Edit</a>
            @endauth
        </div>
    </div>
    <ul class="list-group mt-2">
        Comment:  ({{count($article->comments)}})
        @foreach ($article->comments as $comment )

        <li class="list-group-item">
        <b>{{$comment->user->name}}</b>

           {{$comment->content}}

          @auth
          <a href="{{url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>
          <a href="{{url("/comments/edit/$comment->id")}}" class="btn btn-success ms-5">Edit</a>
          @endauth
           </li>
        @endforeach
       </ul>
     @auth
     <form action="{{url("comments/add")}}" class="m" method="post">
        @csrf
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <textarea name="content"  class="form-control" placeholder="Enter Your Comment"></textarea>
        <button class="btn btn-primary"> Add </button>
    </form>
     @endauth


</div>

@endsection
