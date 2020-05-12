@extends('backend.layout.layout')
@extends('backend.layout.navbar')
@extends('backend.layout.sidebar')
@section('content')
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">role</th>
                <th><a class="btn btn-primary" href=" {{ route('user.create')}} "><i class="fas fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td> {{ $user->role }} </td>
                <td> <img width="50px" src="{{$user->image}}" alt=""> </td>
                <td>
                    <?php
                    $userCategory=$user->category()->get();
                    foreach ($userCategory as $category) {
                      echo $category->name. ", ";
                    }
                ?>
                </td>
                <td>
                    <div class="btn-group btn-group-toggle">
                        <a class="btn btn-warning" href="{{route('user.edit', [$user->id])}}">
                          <i class="far fa-edit"></i>
                        </a>
                                &nbsp;&nbsp;
                        <form action="{{ route('user.destroy', $user->id) }}" method="user">
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
    </table>
    {{-- {{ $users->links() }} --}}
</div>
@endsection
