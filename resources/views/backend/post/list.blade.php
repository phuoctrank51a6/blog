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
        <th><a class="btn btn-block btn-primary btn-lg" href=" {{ route('post.create')}} ">add</a></th>
      </tr>
    </thead>
    <tbody>
      <tbody>
          @foreach ($posts as $post)
              <tr>
              <th scope="row">{{ $post->id }}</th>
              <td>{{ $post->title }}</td>
              <td> {{ $post->content }} </td>
              <td> <img width="50px" src="../storage/{{$post->image}}" alt=""> </td>
              <td>
              <a class="btn btn-block btn-warning btn-lg" href="{{route('post.edit', [$post->id])}}">Edit</a>
              <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button class="btn btn-block btn-danger btn-lg">Destroy</button>
              </form>
              </td>
              </tr>
          @endforeach
      </tbody>
    </tbody>
  </table>
  {{ $posts->links() }}
</div>
@endsection