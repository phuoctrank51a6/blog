@extends('backend.layout.layout')
@extends('backend.layout.navbar')
@extends('backend.layout.sidebar')
@section('content')

<div class="col">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Post</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tilte</label>
            <input type="text" value="{{$post->title}}" class="form-control" id="exampleInputEmail1" name="title" placeholder="Title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror  
        </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"placeholder="Content">{{$post->content}}</textarea>
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                  <img src="../storage{{$post->image}}" alt="">
                <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->

  </div>

  @endsection