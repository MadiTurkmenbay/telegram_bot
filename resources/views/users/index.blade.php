@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все пользователи</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 7%">
                                ID
                            </th>
                            <th>
                                Имя
                            </th>
                            <th>
                                Фамилия
                            </th>
                            <th>
                                Логин
                            </th>
                            <th>
                                Чат ID
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <form method="get" action="{{route('users.index')}}">
                                <td style="width: 7%">
                                    <input name="id" class="form-control" type="text"
                                           value="{{request()->input('id') }}" placeholder="">
                                </td>
                                <td>
                                    <input name="first_name" class="form-control" type="text"
                                           value="{{request()->input('first_name') }}" placeholder="">
                                </td>
                                <td>
                                    <input name="username" class="form-control"  type="text"
                                           value="{{request()->input('username') }}" placeholder="">
                                </td>
                                <td>
                                    <input name="chat_id" class="form-control" type="text"
                                           value="{{request()->input('chat_id') }}" placeholder="">
                                </td>
                                <td>
                                    <input name="password" class="form-control" type="text"
                                           value="{{request()->input('password') }}" placeholder="">
                                </td>
                                <td>

                                </td>
                                <td class="text-right">
                                    <button class="w-100 btn btn-primary" type="submit">Поиск</button>
                                </td>
                            </form>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user['id'] }}
                                </td>
                                <td>
                                    {{ $user['first_name'] }}
                                </td>
                                <td style="white-space: nowrap">
                                    {{ $user['last_name'] }}
                                </td>
                                <td>
                                    {{ $user['username'] }}
                                </td>
                                <td>
                                    {{ $user['chat_id'] }}
                                </td>
                                <td class="project-actions text-right">
{{--                                    @if ($user['role_id'] == 1)--}}
{{--                                        <a class="w-100 btn btn-warning btn-sm edit mb-1" href="{{ route('user.edit', $user->id) }}">--}}
{{--                                            <i class="fas fa-user">--}}
{{--                                            </i>--}}
{{--                                            Сделать пользователем--}}
{{--                                        </a>--}}
{{--                                    @else--}}
{{--                                        <a class="w-100 btn btn-success btn-sm edit mb-1" href="{{ route('user.edit', $user->id) }}">--}}
{{--                                            <i class="fas fa-user">--}}
{{--                                            </i>--}}
{{--                                            Сделать администратором--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                        <a class="w-50 float-left btn btn-dark btn-sm edit mb-1" href="{{ route('user.show', $user->id) }}">--}}
{{--                                            <i class="fas fa-edit">--}}
{{--                                            </i>--}}
{{--                                            Изменить--}}
{{--                                        </a>--}}
{{--                                    <form class="w-50 edit" action="{{ route('user.destroy', $user->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" class="w-100 btn btn-danger btn-sm delete-btn">--}}
{{--                                            <i class="fas fa-trash">--}}
{{--                                            </i>--}}
{{--                                            Удалить--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$users->appends(request()->except('page'))->links('../vendor.pagination.default')}}

                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection()
