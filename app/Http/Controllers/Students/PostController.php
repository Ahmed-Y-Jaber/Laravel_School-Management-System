<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {

        // $posts =  User::with('latestPost')->get();

        // $posts = Post::all()->groupBy('posts.user_id')->last();
       $posts = post::orderBy('id', 'DESC')->get();

    //    $users = User::with('posts')->get();

    // ->hasOne("Post")->latest();
        return view('pages.posts.index',compact('posts'));


    }

//     public function view_post($id){
//         // $user = User::find($id);
//         // $posts = $user->posts()->get();
// return 'aaa';
//         // return view('pages.posts.index',compact('posts'))->with(array("user" => $user, "posts" => $posts))->last();
//     }

    public function create()
    {
        $posts = Post::get();
        return view('pages.posts.create',compact('posts'));

        // create(Request $request)
        // $userid = $request->input('userid');

        // $posts = new post();

    }


    public function store(Request $request)
    {
        try {


            $userid = $request->input('userid');
            $posts = new Post();
            $posts->user_id = $userid;
            $posts->title = $request->title;



            $posts->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Posts.index');
            // return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function show(post $post)
    {
        //
    }


    public function edit(post $post)
    {
        //
    }


    public function update(Request $request, post $post)
    {
        //
    }


    public function destroy(post $post)
    {
        //
    }
}
