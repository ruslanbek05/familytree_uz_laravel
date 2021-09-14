@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" class="form-control" id="content" placeholder="Content" name="content">
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="text" class="form-control" id="image" placeholder="image" name="image">
            </div>
            <div class="form-group">
                <label for="likes">likes</label>
                <input type="text" class="form-control" id="likes" placeholder="likes" name="likes">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                 </select>
            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
