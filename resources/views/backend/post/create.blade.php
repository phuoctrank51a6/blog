@extends('backend.layout.layout')
@extends('backend.layout.navbar')
@extends('backend.layout.sidebar')
@section('content')

<div class="col">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tilte</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Title">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Content</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"
                        placeholder="Content"></textarea>
                    {!! showError($errors,'content') !!}

                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
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
                <div class="form-group">
                    <label for="">Danh mục</label> <br>
                        @foreach ($categories as $item)
                            <input type="checkbox" id="category_id{{ $item->id }}" name="category_id[]" value="{{ $item->id }}">
                            <label for="category_id{{ $item->id }}"> {{$item->name}}</label>
                            &nbsp;
                            <input type="checkbox" id="hot{{ $item->id }}" name="hot[]" value="{{ $item->id }}">
                            <label for="hot{{ $item->id }}">Hot</label> <br>
                        @endforeach
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
