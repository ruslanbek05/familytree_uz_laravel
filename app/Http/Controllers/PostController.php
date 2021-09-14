<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PostController extends \Illuminate\Routing\Controller
{
    public function index()
    {

//        $category = Category::find(1);
//        dd($category->posts);

//        $tag = Tag::find(2);
//
//        dd($tag->posts);


//        $category = Category::find(2);
//        dd($category);
//        $post = Post::find(11);
//        dd($post->category);

//        $posts = Post::where('is_published',1)->get();

//        foreach ($posts as $post){
//            dump($post->title);
//        }

        $posts = Post::all();

//        dump($posts);

//        dd('end');

        return view('post.index', compact('posts'));
    }

    public function create()
    {

//        $postsArr = [
//            [
//                'title' => 'title of post from phpstorm',
//                'content' => 'some interesting content',
//                'image' => 'imagelabla.jpg',
//                'likes' => 20,
//                'is_published' => 1
//            ],
//            [
//                'title' => 'another title of post from phpstorm',
//                'content' => 'another some interesting content',
//                'image' => 'another imagelabla.jpg',
//                'likes' => 50,
//                'is_published' => 1
//            ]
//        ];
//
////        Post::create([
////            'title' => 'title of post from phpstorm',
////            'content' => 'some interesting content',
////            'image' => 'imagelabla.jpg',
////            'likes' => 20,
////            'is_published' => 1
////        ]);
//
//        foreach ($postsArr as $item){
////            dd($item);
//            Post::create($item);
//        }
//
//        dd('created');

        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create',compact('categories', 'tags'));

    }

    public function store()
    {

        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'likes' => 'integer',
            'category_id' => '',
            'tags' => '',
        ]);

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


    public function show(Post $post)
    {

        return view('post.show', compact('post'));

    }

    public function edit(Post $post)
    {

//        dd($post->title);
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post','categories','tags'));

//        return view('post.show',compact('post'));

    }


    public function update(Post $post)
    {

//        $post = Post::find(1);
//
////        $post->update([
////            'title' => '111updated ',
////            'content' => 'updated another some interesting content',
////            'image' => 'updated another imagelabla.jpg',
////            'likes' => 50,
////            'is_published' => 1
////        ]);
//
//        $post->update([
//            'title' => '111updated '
//        ]);
//

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'likes' => 'integer',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);

        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');

    }

    public function delete()
    {

        $post = Post::find(1);

        $post->delete();


//        dd($post->title);
        dd('deleted');
    }

    public function restore()
    {

        $post = Post::withTrashed()->find(1);

        $post->restore();

        dd('restored');
    }

    public function firstOrCreate()
    {

        $post = Post::find(1);

        $anotherPost = [
            'title' => 'some title of post from phpstorm',
            'content' => 'some some interesting content',
            'image' => 'some imagelabla.jpg',
            'likes' => 50000,
            'is_published' => 1
        ];

        $post = Post::firstOrCreate(
            [
                'title' => 'some title phpstorm'
            ],
            [
                'title' => 'some title phpstorm',
                'content' => 'some content',
                'image' => 'some imagelabla.jpg',
                'likes' => 50000,
                'is_published' => 1
            ]);

        dd($post->content);
        dd('finished');

    }

    public function updateOrCreate()
    {

        $anotherPost = [
            'title' => 'updateOrCreate title of post from phpstorm',
            'content' => 'updateOrCreate some interesting content',
            'image' => 'updateOrCreate imagelabla.jpg',
            'likes' => 500,
            'is_published' => 0
        ];

        $post = Post::updateOrCreate(
            [
                'title' => 'some title not phpstorm',
            ],
            [
                'title' => 'some title not phpstorm',
                'content' => 'it is not updateOrCreate some interesting content',
                'image' => 'updateOrCreate imagelabla.jpg',
                'likes' => 500,
                'is_published' => 0
            ]);

        dump($post->content);
        dd('update or create finished');


    }

}
