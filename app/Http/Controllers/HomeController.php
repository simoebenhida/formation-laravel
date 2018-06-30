<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Dependency injection
        // $request = new Request;

        // return $request->method();
        $post = factory('App\Post', 20)->create();

        $comment = factory('App\Comment', 5)->create([
            'post_id' => $post->first()->id
        ]);
        
        return view('welcome');
    }
}
