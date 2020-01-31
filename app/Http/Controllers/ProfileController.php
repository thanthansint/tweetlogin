<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class ProfileController extends Controller
{

    function show() {
        if (Auth::check()) {
            // $tweets=DB::table('Tweets')->get();
           $result = \App\Tweet::all();
           //$result = \App\Tweet::find(4);
            return view('profile',['tweets'=>$result]);
        } else {
            return view('profile');
        }
    }
    function showTweet($id){
        $tweets =App\Tweets::find($id);
        return view('profile', ['tweets' => $tweets]);
    }
    function createTweet(Request $request) {
        $validatedData = $request->validate([
            'content' => 'required|max:250',
            'author' => 'required|max:50'
        ]);

        if (Auth::check()) {
            $tweet =new \App\Tweet;
            $tweet->author = $request->author;
            $tweet->content = $request->content;
            $tweet->save();

           $result = \App\Tweet::all();
            return view('profile',['tweets'=>$result]);
        } else {
            return view('profile');
        }
        // return view('createTweet');
    }
    function showEditForm(Request $request){
        $tweet = \App\Tweet::find($request->id);
        return view('editTweetForm', ['tweet'=>$tweet]);
    }
    function editTweet(Request $request){
        //$tweet =new \App\Tweet;
        $tweet = \App\Tweet::find($request->id);
        $tweet->author = $request->author;
        $tweet->content = $request->content;
        $tweet->save();
        $result = \App\Tweet::all();
        return view('profile',['tweets'=>$result]);
        //return view('editTweet',["id"=> $request->edit] );
    }
}
