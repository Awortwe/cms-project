<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $image = $request->file('image');
        $imageName = time(). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(500,450)->save('uploads/post_images/'. $imageName);
        $save_url = 'uploads/post_images/'. $imageName;

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $save_url,
            'published_at' => $request->published_at,
        ]);

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Post created successfully'
        );

        return redirect()->route('posts.index')->with($notification);
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
        return view('backend.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post_id = $request->id;
        if($request->file('image'))
        {
            $image = $request->file('image');
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500,450)->save('uploads/post_images/'. $imageName);
            $save_url = 'uploads/post_images/'. $imageName;

            Post::findOrFail($post_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'image' => $save_url,
                'published_at' => $request->published_at,
            ]);

            $notification = array(
                'alert-type' => 'success',
                'message' => 'Post updated with image successfully'
            );

            return redirect()->route('posts.index')->with($notification);
        }
        else{
            Post::findOrFail($post_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'published_at' => $request->published_at,
            ]);

            $notification = array(
                'alert-type' => 'success',
                'message' => 'Post updated without image successfully'
            );

            return redirect()->route('posts.index')->with($notification);
        }

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

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Post trashed successfully'
        );

        return redirect()->back()->with($notification);

    }

    public function trashPosts()
    {
        $trashed = Post::onlyTrashed()->get();
        return view('backend.posts.trash_posts', compact('trashed'));
    }

    public function deleteTrashed($id)
    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->forceDelete();
        unlink(public_path('uploads/post_images/'.  $post->image));

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Post deleted permanently'
        );

        return redirect()->back()->with($notification);

    }

    public function restore(Request $request)
    {
        $id = $request->id;
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Post restored successfully'
        );

        return redirect()->back()->with($notification);

    }
}
