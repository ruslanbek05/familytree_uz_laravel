@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" class="form-control" id="content" placeholder="Content" name="content" value="{{$post->content}}">
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="text" class="form-control" id="image" placeholder="image" name="image" value="{{$post->image}}">
            </div>
            <div class="form-group">
                <label for="likes">likes</label>
                <input type="text" class="form-control" id="likes" placeholder="likes" name="likes" value="{{$post->likes}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
