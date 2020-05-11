@extends('backend.layout.layout')
@extends('backend.layout.navbar')
@extends('backend.layout.sidebar')
@section('content')
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">image</th>
                <th scope="col">Hot</th>
                <th><a class="btn btn-primary" href=" {{ route('post.create')}} "><i class="fas fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            @foreach ($categoryListPosts as $post)
            <tr>
                <th scope="row">{{ $post->post_id }}</th>
                <td>{{ $post->post->title }}</td>
                <td> {{ $post->post->content }} </td>
                <td> <img width="50px" src="{{$post->post->image}}" alt=""> </td>
                <td>
                    @if ($post->hot != 1)
                        Không
                    @endif
                    Hot
                </td>
                {{-- <td>
                    <div class="btn-group btn-group-toggle">
                        <a class="btn btn-warning" href="{{route('post.edit', [$post->id])}}">
                          <i class="far fa-edit"></i>
                        </a>
                                &nbsp;&nbsp;
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger">
                              <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
    {{-- {{ $posts->links() }} --}}
</div>
@endsection
