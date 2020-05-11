<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostCategory;
use Illuminate\Support\Arr;
use App\Http\Requests\PostRequest;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::all();
        return view('backend.post.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('backend.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // $data = Arr::except($request->all(), [
        //     '_token',
        //     'image',
        //     'category_id',
        //     'hot'
        // ]);

        $data = $request->input();

        $post = new Post;
        $post->fill($data);

        // dd($request->file('image'));
        if ($request->file('image') != null) {
            // $post->image = $request->file('image')->store('images', 'public');
            $post->image = $request['image']->store('images', 'public');
        } else {
            $post->image = 'images/no-image.png';
        }

        $post->save();

        $hot = $request->input('hot') ?? [];
        foreach ($request->input('category_id') ?? [] as $cId) {
            PostCategory::create([
                'post_id' => $post->id,
                'category_id' => $cId,
                'hot' => in_array($cId, $hot)
            ]);
        }

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function listPostCategory($id)
    {
        // dd($id);
        $categoryListPosts= PostCategory::where('category_id', $id)->get()->SortByDesc('hot');
        // dd($categoryListPosts);
        // $post_id_list = array_map(function($val){
        //     return $val->post_id;
        // }, $categoryListPosts);
        // dd($post_id_list);
        return view('backend.post.list-post', ['categoryListPosts' => $categoryListPosts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::where('id', $id)->first();
        $postCategories = PostCategory::where('post_id', $id)->get();
        return view('backend.post.edit', [
            'categories' => $categories,
            'post' => $post,
            'postCategories' => $postCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        // $data = Arr::except($request->all(), ['_token', 'image', 'hot']);
        $data = $request->input();
        $post = Post::find($id);
        $post->fill($data);
        if ($request['image'] != null) {
            $data['image'] = $request['image']->store('storage/images', 'public');
        } else {
            $data['image'] = 'images/no-image.png';
        }
        $post->update($data);

        $hot = $request->input('hot') ?? [];
        // dd($request->input('category_id'));
        $postCategories = PostCategory::where('post_id', $id)->delete();
        // dd($postCategories);
        // $postCategories ->destroy('post_id', $id);
        foreach ($request->input('category_id') ?? [] as $cId) {
            PostCategory::create([
                'post_id' => $post->id,
                'category_id' => $cId,
                'hot' => in_array($cId, $hot)
            ]);
        }
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // dd($post);
        $postCategories = PostCategory::where('post_id', $id)->delete();
        $post->delete();
        return redirect()->route('post.index');
    }
}
