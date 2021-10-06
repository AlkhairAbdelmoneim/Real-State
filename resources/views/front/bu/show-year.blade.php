@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">كل العقارات المضافة خلال سنة {{$year}}</h3>
                    <form action="{{ route('showYear') }}" method="GET">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="year" class="form-control">
                                        <option value="" disabled selected hidden>إختر السنة...
                                        </option>
                                        @for ($i = 2015; $i <= 2100; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info"><i class=" fa fa-plus">الإحصائيات</i></button>

                            </div>
                        </div>
                    </form>
                </div>
                <!----End box of header----->
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
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
                                            <strong>رسم بياني</strong>
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

                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);


        var salesChartData = {

            labels: [
                "يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يولو", "أغسطس", "سبتمبر", "أُكتوبر", "نوفمبر",
                "ديسمبر"
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
    </script>
@endpush
