<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Arr;
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
        $posts = Post::paginate(5);
        // dd($posts);
        return view('backend.post.list', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
    //     $validatedData = $request->validate([
    //         'title'      => 'required|min:2|unique:posts,title',
    //         'content'     => 'required|min:10',
    //         'image'         => 'image',
    //     ],
    //     [
    //         'required' => ':attribute không được để trống',
    //         'min'   => " :attribute quá ngắn",
    //         'unique' => ' :attribute trùng',
    //         'image' => ' :attribute không đúng chuẩn ảnh'
    //     ],
    //     [
    //         'title' => 'Tiêu đề',
    //         'content' => 'Nội dung',
    //         'image' => 'file'
    //     ]
    // );
        $data = Arr::except($request->all(), [
            '_token',
            'image',
            ]);
            if($request['image'] != null){
                $data['image'] = $request['image']->store('images', 'public');
            }else{
                $data['image'] = 'images/no-image.png';
            }
            // dd($data);
            Post::create($data);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        return view('backend.post.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'      => 'required|min:2|unique:posts,title',
            'content'     => 'required|min:10',
            'image'         => 'image',
        ],
        [
            'required' => ':attribute không được để trống',
            'min'   => " :attribute quá ngắn",
            'unique' => ' :attribute trùng',
            'image' => ' :attribute không đúng chuẩn ảnh'
        ],
        [
            'title' => 'Tiêu đề',
            'content' => 'Nội dung',
            'image' => 'file'
        ]
    );
        $data= Arr::except($request->all(), ['_token','image']);
        $post=Post::find($id);
        // dd($post);
            if($request['image'] != null){
                $data['image'] = $request['image']->store('storage/images', 'public');
            }else{
                $data['image'] = 'images/no-image.png';
            }
        // dd($data);
        $post->update($data);
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
        // dd($id);
        $post=Post::find($id);
        // dd($post);
        $post->delete();
        return redirect()->route('post.index');
    }
}
