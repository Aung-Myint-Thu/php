@extends("layouts.app")
@section("content")
<div class="container">
    @if($errors->any())
    @foreach ($errors->all() as $error )
    <div class="alert alert-warning">
        {{$error}}
    </div>

    @endforeach
    @endif

    <form method="post">
        @csrf
        <h1 class="h4">Comment Edit</h1>
        <input type="hidden" name="article_id" value="{{$comment->article_id}}">
        <textarea name="content" value="{{$comment->content}}" class="form-control"></textarea>
        <button class="btn btn-secondary mt-2"> Update </button>
    </form>

</div>
@endsection
