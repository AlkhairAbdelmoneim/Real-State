@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">
            <li><a href="{{route('adminbanel')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('users.index')}}">@lang('site.users')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.add')</h3>
                </div> <!----End box of header----->
                <div class="box-body">

                    @include('partials._errors')

                <form action="{{route('users.store')}}" method="POST">
                    @csrf
                    {{method_field('post')}}

                    <div class="form-group">
                        <label>@lang('site.name')</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>   

                    <div class="form-group">
                        <label>@lang('site.email')</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    </div>                       

                    <div class="form-group">
                        <label>@lang('site.password')</label>
                        <input name="password" class="form-control" value="{{old('password')}}">
                    </div>         
                    
                    <div class="form-group">
                        <label for="projectinput2"> اختر الصلاحية </label>
                        <select name="admin" class="form-control">
                            <optgroup label="@lang('site.permisions')">

                                <option value="admin">Admin</option>
                                <option value="user">User</option>

                            </optgroup>
                        </select>
                    </div>                     

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class=" fa fa-plus">@lang('site.add')</i></button>
                    </div>                
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection