<?php

use Illuminate\Support\Facades\Route;

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
    // return ['foo' => 'bar']; JSON FILE
    return view('posts');
});

Route::get('posts/{post}', function($slug){
    if(! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")){
        // ddd('file does not exist');
        // abort(404);
        return redirect('/');
    }


    // ddd($path);
    
   

    $post = cache()-> remember("posts.{$slug}", 1200, fn()=>file_get_contents ($path));
    //     var_dump('file_get_contents');
    // //   return );
    // });
  

    return view ('post',[ 'post' => $post]);
    
})->where('post', '[A-z_\-]+');
