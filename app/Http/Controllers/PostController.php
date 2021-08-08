<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\PostRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{

    private $posts;

    public function __construct()
    {
        $posts = resolve('PostRepository');
        $this->posts = $posts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group)
    {
        $post = $this->posts->getByGroupId($group->id);
        $tag = app('Tag');
        return view('group.posts' , ['group'=>$group->id,'tags'=>$tag, 'posts'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$group)
    {
        $postTag = app('Tag');
        $post = app('Post');

        $request->validate([
            'caption' => 'required|string|max:1024|min:3',
            'imagePost' => 'max:1000|required|image',
            'tags' => 'required'
        ]);


        $caption = $request->caption;
        $file = $request->file('imagePost');
        $imgname = 'storage/' . time() . $file->getClientOriginalName();
        $file->move('storage', $imgname);

        $post->image_addr = $imgname;
        $post->text = $caption;
        $post->group_id = $group;
        $post->save();

        $tags = $request->tags;

        $id = $post->id;
        $post = $this->posts->find($id);

        foreach ($tags as $tag){
            $nameTag = $postTag->where('name',$tag)->get();
            $post->tags()->attach($nameTag[0]->id);
        }

        flash('Your Post has been created.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
