@extends('backend.layout.layout')
@extends('backend.layout.navbar')
@extends('backend.layout.sidebar')
@section('content')

<div class="col">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Category</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="">Danh mục cha:</label>
            <select class="form-control" name="parent_id" id="">
              <option value="0">----ROOT----</option>
              {{ getCategory($categories,0,'',0) }}
            </select>
          </div>
          <div class="form-group">
            <label for="">Tên Danh mục</label>
            <input type="text" class="form-control" name="name" id="" placeholder="Tên danh mục mới">
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