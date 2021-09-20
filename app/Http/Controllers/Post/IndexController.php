<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {

//        $this->authorize('view', auth()->user());

        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

//        $posts = Post::filter($filter)->get();
        $posts = Post::filter($filter)->paginate($perPage, ['*'],'page',$page);

//        dd($posts);

//        $query = Post::query();
//
//        if(isset($data['category_id']))
//        {
//            $query->where('category_id', $data['category_id']);
//        }
//
//        if(isset($data['title']))
//        {
//            $query->where('title','like', "%{$data['title']}%");
//        }
//
//
//        $posts = $query->get();
//
//        dd($posts);

        // TODO: Implement __invoke() method.
//        $posts = Post::paginate(10);
//        return view('post.index', compact('posts'));

        return PostResource::collection($posts);
    }
}
