@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminbanel') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">@lang('site.users')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.users')<small
                            style="color: #f03">{{ ' ' . $users->total() }}</small></h3>

                    <form action="{{ route('users.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{ request()->search }}"
                                        placeholder="@lang('site.search')">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-flat">@lang('site.search')</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <a href="{{ route('users.create') }}" class="btn btn-primary"><i
                                        class="fa fa-plus"></i>@lang('site.add')</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    @if (isset($users) && $users->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.email')</th>
                                    <th>@lang('site.permisions')</th>
                                    <th>@lang('site.mybuilding')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->getAdmin() }}</td>
                                        <td><a href="{{ route('building', $user->id) }}"
                                                class="btn btn-warning btn-sm">@lang('site.mybuilding')</a></td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm"><i
                                                    class="fa fa-edit"></i>@lang('site.edit')</a>

                                            <form method="post" action="{{ route('users.destroy', $user->id) }}"
                                                style="display: inline-block">
                                                @csrf
                                                {{ method_field('delete') }}
                                                @if ($user->id != 1)
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                                class="fa fa-trash"></i>@lang('site.delete')</button>
                                                    </div>
                                                @else
                                                    <span class="btn btn-danger btn-sm disabled"><i
                                                            class="fa fa-trash"></i>@lang('site.delete')</span>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="content-center">
                            {{ $users->appends(request()->query())->links() }}
                        </div>
                    @else
                        <h2> @lang('site.no_data_found')</h2>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
