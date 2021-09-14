<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PostController extends \Illuminate\Routing\Controller
{
    public function index(){

//        $posts = Post::where('is_published',1)->get();

//        foreach ($posts as $post){
//            dump($post->title);
//        }

        $posts = Post::all();

//        dump($posts);

//        dd('end');

        return view('posts', compact('posts'));
    }

    public function create(){

        $postsArr = [
            [
                'title' => 'title of post from phpstorm',
                'content' => 'some interesting content',
                'image' => 'imagelabla.jpg',
                'likes' => 20,
                'is_published' => 1
            ],
            [
                'title' => 'another title of post from phpstorm',
                'content' => 'another some interesting content',
                'image' => 'another imagelabla.jpg',
                'likes' => 50,
                'is_published' => 1
            ]
        ];

//        Post::create([
//            'title' => 'title of post from phpstorm',
//            'content' => 'some interesting content',
//            'image' => 'imagelabla.jpg',
//            'likes' => 20,
//            'is_published' => 1
//        ]);

        foreach ($postsArr as $item){
//            dd($item);
            Post::create($item);
        }

        dd('created');

    }

    public function update(){

        $post = Post::find(1);

//        $post->update([
//            'title' => '111updated ',
//            'content' => 'updated another some interesting content',
//            'image' => 'updated another imagelabla.jpg',
//            'likes' => 50,
//            'is_published' => 1
//        ]);

        $post->update([
            'title' => '111updated '
        ]);

        dd('updated');

    }

    public function delete(){

        $post = Post::find(1);

        $post->delete();


//        dd($post->title);
        dd('deleted');
    }

    public function restore(){

        $post = Post::withTrashed()->find(1);

        $post->restore();

        dd('restored');
    }

    public function firstOrCreate(){

        $post = Post::find(1);

        $anotherPost =[
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

    public function updateOrCreate(){

        $anotherPost =[
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
