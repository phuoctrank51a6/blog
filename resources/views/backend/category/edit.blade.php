@extends('backend.layout.layout')
@extends('backend.layout.navbar')
@extends('backend.layout.sidebar')
@section('content')

<div class="col">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Category</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="card-body">
          <div class="form-group">
            <label for="">Danh mục cha:</label>
            <select class="form-control" name="parent_id">
              <option value="0">----ROOT----</option>
              @foreach ($categories as $item)
              <option @if ($item->id == $category->parent_id) selected @endif value="{{ $item->id }}"> {{$item->name}} </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Tên Danh mục</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Tên danh mục mới">
              {{ showError($errors,'name') }}
            
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