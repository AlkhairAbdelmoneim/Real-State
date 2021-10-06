@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.messages')</h1>
            <ol class="breadcrumb">
            <li><a href="{{route('adminbanel')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('contact_us.index')}}">@lang('site.messages')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.edit') {{--<small>Quick Exapm</small>--}}</h3>
                </div> <!----End box of header----->
                <div class="box-body">

                    @include('partials._errors')

                <form action="{{route('contact_us.update' , $resualt->id)}}" method="POST">
                    @csrf
                    {{method_field('put')}}

                    <div class="form-group">
                        <label>@lang('site.name_send')</label>
                        <input type="text" name="name" class="form-control" value="{{$resualt->name}}">
                    </div>   

                    <div class="form-group">
                        <label>@lang('site.email')</label>
                        <input type="email" name="email" class="form-control" value="{{$resualt->email}}">
                    </div>  
                    
                    <div class="form-group">
                        <label>@lang('site.address')</label>
                        <input type="text" name="address" class="form-control" value="{{$resualt->address}}">
                    </div>                      
                    
                    <div class="form-group">
                        <label>@lang('site.phone')</label>
                        <input type="text" name="phone" class="form-control" value="{{$resualt->phone}}">
                    </div>        
                    
                    <div class="form-group">
                        <label>@lang('site.contact_type')</label>
                        <input type="text" name="contact_type" class="form-control" value="{{$resualt->contact_type}}">
                    </div>                         
                    
                    <div class="form-group">
                        <label>@lang('site.message')</label>
                        <textarea name="message" id="" class="form-control" cols="4" rows="4">{{$resualt->message}}</textarea>
                    </div>                                          

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class=" fa fa-plus">@lang('site.edit')</i></button>
                    </div>                
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection