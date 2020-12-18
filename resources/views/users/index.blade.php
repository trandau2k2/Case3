@extends('layouts.master')
@section('content')
    <div class="container">

        <div class="col-12 col-md-12">
{{--            @can('create-user')--}}
                <a href="{{route('user.create')}}" class="btn btn-success">ADD</a>
{{--            @endcan--}}
            <div class="col-12 col-md-12">

            <form action="{{route('user.search')}}" class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control bg-light border-0 small"
                           placeholder="Search for..." aria-label="Search"
                           aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search
{{--                            <i class="fas fa-search fa-sm"></i>--}}
                        </button>
                    </div>
                </div>
            </form>
            </div>
                <table class="table">
                    <thead class="table-primary">
                    <tr bgcolor="#7fffd4">
                        <th  scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr bgcolor="#faebd7">
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{$role->name . ';'}}
                                @endforeach
                            </td>
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{route('delete.store', $user->id)}}"
                                   class="btn btn-danger">Delete</a>
                                <a href="{{route('update.store', $user->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
        </div>
    </div>
@endsection
