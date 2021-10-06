<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alkhair</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
             <li><a href="{{route('adminbanel') }}"><i class="fa fa-home"></i><span>@lang('site.home')</span></a></li>

            <li><a href="{{ route('users.index') }}"><i class="fa fa-group"></i><span>@lang('site.users')</span></a></li>

            <li><a href="{{ route('building.index') }}"><i class="fa fa-building"></i><span>@lang('site.building')</span></a></li>
            
            <li><a href="{{ route('contact_us.index') }}"><i class="fa fa-envelope-o"></i><span>@lang('site.messages')</span></a></li>
            
            <li><a href="{{ route('showYear') }}"><i class="fa fa-th"></i><span>@lang('site.buYear')</span></a></li>
            
            <li><a href="{{ route('settings.index') }}"><i class="fa fa-cogs"></i><span>@lang('site.site_setting')</span></a></li>

        </ul>

    </section>

</aside>

