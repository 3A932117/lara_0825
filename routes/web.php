<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    //return view('index');
    //return view('post');
    //return view('contact');
    //return view('about');
    //return redirect(route('posts.index'));

    /////使用save()新增資料/////
    /*$post = new Post(); //先產生Post的物件 $post, $post將代表posts資料表的第一則貼文
    $post -> title = 'test titles'; //指定貼文的title
    $post -> content = 'test content'; //指定貼文的content
    $post -> save(); //將新貼文$post存入posts資料表
    return'Save, OK!';*/

    /////使用create()新增資料/////
    /*Post::create([
        'title' => 'create title',
        'content' => 'create content',
    ]);
    return'Save, OK!';*/

    /////使用all()查詢資料/////
    /*$posts = Post::all(); //取出posts資料表所有貼文
    dd($posts); //dd()是一個輔助方法，dd = data dump，可將變數內容直接倒出，並停止程式執行
    return'Save, OK!';*/

    /////使用find()查詢資料/////
    /*post = Post::find(2); //倒出id=2的內容
    dd($post);
    return'Save, OK!';*/

    /////使用 條件式 查詢資料/////
    /*$posts = Post::where('id', '<', 10)->orderBy('id', 'DESC')->get();//查詢符合條件(id<10)的貼文
    dd($posts);
    return'Save, OK!';*/

    /////使用update()更新資料/////
    /*$post = Post::find(2);
    $post -> update([
        'title' => 'update title',
        'content' => 'update content',
    ]);
    return'Update, OK!';*/

    /////使用delete()刪除資料/////
    /*$post = Post::find(11);
    $post -> delete();
    return 'Deleted!';*/

    /////使用destroy()刪除資料/////
    //Post::destroy(2);

    /////使用destroy()刪除多筆資料/////
    /*Post::destroy(3, 5, 7);
    return 'Deleted!';*/

    /////使用all()取得Collection(多筆貼文的集合)/////
    /*$allPosts = Post::all();
    dd($allPosts);*/

    /*$featuredPosts = Post::where('is_feature', 1)->get(); //多筆貼文的集合
    dd($featuredPosts);*/

    /////取得Model 單一筆貼文/////
    /*$fourthPost = Post::find(4);
    dd($fourthPost);*/

    /*$lastPost = Post::orderBy('id', 'DESC')->first(); //先抓資料遞減排序，然後只取第一筆
    dd($lastPost);*/

    /////練習7/////
    /*$post = Post::find(10); //找資料表中id=6的資料
    echo '標題:'.$post->title.'<br>';
    echo '內容:'.$post->content.'<br>';
    echo '<hr>';
    $comments = $post->comments()->get(); //->get()可省略
    foreach ($comments as $comment){
        echo '留言: '.$comment->content."<br>";
        echo '-----------------------------'.'<br>';
    }*/

    /////透過post()關係，擷取一筆posts資料/////
    $comment = Comment::find(2);
    echo $comment->content.'<br>';
    echo '******************'.'<br>';
    $post = $comment->post()->first();
    echo $post->id.'<br>';
    echo $post->title.'<br>';
    echo $post->content.'<br>';

});

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('post', [PostController::class, 'show'])->name('posts.show');
Route::get('contact', [PostController::class, 'contact'])->name('posts.contact');
Route::get('about', [PostController::class, 'about'])->name('posts.about');
