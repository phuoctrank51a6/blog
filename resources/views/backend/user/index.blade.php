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
                <th scope="col">Email</th>
                <th><a class="btn btn-primary" href=" {{ route('user.create')}} "><i class="fas fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td> {{ $user->email }} </td>
                <td> {{ $user->role }} </td>
                <td>
                    <div class="btn-group">
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
