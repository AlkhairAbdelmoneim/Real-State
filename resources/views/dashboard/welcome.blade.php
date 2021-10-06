@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.home')</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminbanel') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">@lang('site.users')</li>
            </ol>
        </section>
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">عدد الرسائل</span>
                            <span class="info-box-number">{{ $contactUsCount }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">العقارات غير المفعلة</span>
                            <span class="info-box-number">{{ $bunotActive }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-building-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">العقارات المفعلة</span>
                            <span class="info-box-number">{{ $buActive }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">عدد الاعضاء</span>
                            <span class="info-box-number">{{ $usersCount }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">كل العقارات المضافة خلال سنة {{ date('Y') }}</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i
                                            class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        {{-- <strong>رسم بياني</strong> --}}
                                    </p>
                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" style="height: 180px;"></canvas>
                                    </div><!-- /.chart-responsive -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- MAP & BOX PANE -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">أماكن العقارات</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="pad">
                                        <!-- Map will be created here -->
                                        <div id="world-map-markers" style="height: 325px;"></div>
                                    </div>
                                </div><!-- /.col -->
                                {{-- <div class="col-md-3 col-sm-4">
                                    <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                        <div class="description-block margin-bottom">
                                            <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                                            <h5 class="description-header">8390</h5>
                                            <span class="description-text">Visits</span>
                                        </div><!-- /.description-block -->
                                        <div class="description-block margin-bottom">
                                            <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                            <h5 class="description-header">30%</h5>
                                            <span class="description-text">Referrals</span>
                                        </div><!-- /.description-block -->
                                        <div class="description-block">
                                            <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                            <h5 class="description-header">70%</h5>
                                            <span class="description-text">Organic</span>
                                        </div><!-- /.description-block -->
                                    </div>
                                </div><!-- /.col --> --}}
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <!-- PRODUCT LIST -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">آخر العقارات المضافة</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">

                                @foreach ($latestBu as $building)

                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{ $building->image_path }}" alt="No Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('building.edit', $building->id) }}"
                                                class="product-title">{{ $building->bu_name }}<span
                                                    class="label label-warning pull-right">{{ $building->bu_price }}</span></a>
                                            <span class="product-description">
                                                {!! $building->bu_smail_dis !!}
                                            </span>
                                        </div>
                                    </li><!-- /.item -->

                                @endforeach
                            </ul>
                        </div><!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{ route('building.index') }}" class="uppercase">كل العقارات</a>
                        </div><!-- /.box-footer -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-4">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">آخر الاعضاء المسجلين</h3>
                            <div class="box-tools pull-right">
                                <span class="label label-danger">{{ $latestUser->count() }} أعضاء جدد</span>
                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">

                                @foreach ($latestUser as $user)
                                    <li>
                                        <img src="{{ asset('dashboard_files/img/avatar.png') }}" alt="User Image"
                                            title="{{ $user->name }}">
                                        <a class="users-list-name"
                                            href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a>
                                        <span
                                            class="users-list-date">{{ $user->created_at->toFormattedDateString() }}</span>
                                    </li>
                                @endforeach

                            </ul><!-- /.users-list -->
                        </div><!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{ route('users.index') }}" class="uppercase">كل الاعضاء</a>
                        </div><!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div><!-- /.col -->

                <div class="col-md-8">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">آخر الرسائل</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('site.name')</th>
                                            <th>@lang('site.email')</th>
                                            <th>@lang('site.contact_type')</th>
                                            <th>@lang('site.message')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latestMessage as $key => $msg)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><a
                                                        href="{{ route('contact_us.edit', $msg->id) }}">{{ $msg->name }}</a>
                                                </td>
                                                <td>{{ $msg->email }}</td>
                                                <td>{{ $msg->contact_type }}</td>

                                                @if ($msg->status == 1)
                                                    <td><span class="label label-success"><i class="fa fa-envelope-o"
                                                                style="margin-left: 3px"></i>مقروءة</td>

                                                @else
                                                    <td><span class="label label-danger"><i class="fa fa-envelope-o"
                                                                style="margin-left: 3px"></i>غير مقروءة</td>
                                                @endif
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{ route('contact_us.index') }}" class="btn btn-sm btn-info btn-flat pull-left">كل
                                الرسائل</a>
                        </div><!-- /.box-footer -->
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>
@endsection

@push('scripts')


    <script>
        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يولو", "أغسطس", "سبتمبر",
                "أُكتوبر", "نوفمبر", "ديسمبر"
            ],
            datasets: [

                {
                    label: "Digital Goods",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [
                        @foreach ($new as $count)
                            @if (is_array($count))
                        
                                {{ $count['counting'] }},
                        
                            @else
                        
                                {{ $count }},
                        
                            @endif
                        @endforeach
                    ]
                }
            ]
        };

        $('#world-map-markers').vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: false,
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: 'rgba(210, 214, 222, 1)',
                    "fill-opacity": 1,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    "fill-opacity": 0.7,
                    cursor: 'pointer'
                },
                selected: {
                    fill: 'yellow'
                },
                selectedHover: {}
            },
            markerStyle: {
                initial: {
                    fill: '#00a65a',
                    stroke: '#111'
                }
            },
            markers: [

                @foreach ($mapping as $map)
                
                    {latLng: [{{ $map->bu_latitude }}, {{ $map->bu_langtude }}],name: '{{ $map->bu_name }}'},
                
                @endforeach

            ]
        });
    </script>
@endpush
