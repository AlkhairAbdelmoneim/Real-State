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
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.add') {{--<small>Quick Exapm</small>--}}</h3>
                </div> <!----End box of header----->
                <div class="box-body">

                    @include('partials._errors')

                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('post')}}

                    @foreach ($resultOfFilter as $result)
                        <div class="form-group">
                            <label>{{$result}}</label>
                            <input type="text" name="sitename" class="form-control" value="{{old('sitename')}}">
                        </div>                         
                    @endforeach                    

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class=" fa fa-plus">@lang('site.add')</i></button>
                    </div>                
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection