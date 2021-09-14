<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // TODO: Implement __invoke() method.
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

//        dd($tags, $data);

        $post = Post::create($data);

//        foreach ($tags as $tag)
//        {
//            PostTag::firstOrcreate([
//                'tag_id'=>$tag,
//                'post_id'=>$post->id,
//
//            ]);
//        }

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }
}
