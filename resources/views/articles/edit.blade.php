@extends("layouts.app")
@section("content")
<div class="container">
    @if ($errors->any())
    @foreach ($errors->all() as $err )
    <div class="alert alert-warning">
        <li>{{$err}} </li>
    </div>

    @endforeach

    @endif

    <form method="post">
        @csrf
        <div class="mb-2">
            <label > Title</label>
            <input type="text" name="title" class="form-control" >
        </div>
        <div class="mb-2">
            <label > Body</label>
            <textarea name="body" type="text" class="form-control"></textarea>
        </div>
        <div class="mt-2">
            <label > Category </label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category )
                <option value="{{$category['id']}}">
                    {{$category['name']}}
                </option>

                @endforeach
            </select>
        </div>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>

@endsection
