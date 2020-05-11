@extends('backend.layout.layout')
@extends('backend.layout.navbar')
@extends('backend.layout.sidebar')
@section('content')
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">parent_id</th>
                <th><a class="btn btn-primary" href=" {{ route('category.create')}} "><i
                            class="fas fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>
                    <a href="{{ route('categoryListPosts', $category->id) }}">{{ $category->name }}</a>
                </td>
                <td> {{ $category->parent_id }} </td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-warning" href="{{route('category.edit', $category->id)}}">
                            <i class="far fa-edit"></i>
                        </a>
                        &nbsp; &nbsp;
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
    {{ $categories->links() }}
</div>
@endsection
