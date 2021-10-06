@extends('layouts/master')

@section('meta')
@foreach ($buInfo as $bu)
{{--  <meta name="description" content="">
<meta name="keywords" content="">  --}}

<meta property="og:image" content="{{ asset('front/img/og.jpg') }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:title" content="{{$bu->bu_name}}">
<meta property="og:description" content="{!!$bu->bu_smail_dis!!}">
<meta name="keywords" content="{!!$bu->bu_meta!!}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{route('singleBuilding' ,$bu->id)}}">
@endforeach
@endsection

@section('navbar')

    @include('layouts._navbar2')

@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('front/css/digrams_info.css')}}">
@endsection

@section('title')
    <title>
        @foreach ($buInfo as $bu)
            {{$bu->bu_name}}
        @endforeach
    </title>
@endsection

@section('content')
    <!-- Start carsuel -->
    {{-- <div class="slider">
        <div id="main-slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators carousel-none">
                <button type="button" data-bs-target="#main-slider" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#main-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#main-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="overlay"></div>
                <div class="carousel-item active carousel-one">
                    <div class="carousel-caption d-md-block">
                        <h2>الأُمراء</h2>
                        <p>عدد من المشاريع الخدمية والبنية التحتية</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End carsuel -->
    <!-- Start digram -->
    <div class="digram">
        <div class="container">
            <div class="row">

                @include('front.bu._siteMenu')

                <div class="col-md-8 fl-left text-content">
                    <div class="container">
                        <div class="row">                         
                            @if (isset($buInfo) && $buInfo->count() > 0)

                                @foreach ($buInfo as $key => $bu)

                                    <h1>{{$bu->bu_name}}</h1>

                                    <div class="headers header-color clearfix">
                                        <div class="div-content">
                                            <ul>
                                                <div class="col-lg-2"><li><a class="" href="{{route('type', $bu->bu_type)}}" title="@lang('site.bu_type')">@lang('site.bu_type')</a><small>{{$bu->getType()}}</small></li></div>
                                                <div class="col-lg-2"><li><a class="" href="{{route('search', ['bu_square' => $bu->bu_square])}}" title="@lang('site.bu_square')">@lang('site.bu_square')</a><small>{{$bu->bu_square}}</small></li></div>
                                                <div class="col-lg-2"><li><a class="" href="{{route('search', ['rooms' => $bu->rooms])}}" title="@lang('site.rooms')">@lang('site.rooms')</a><small>{{$bu->rooms}}</small></li></div>
                                                <div class="col-lg-2"><li><a class="" href="{{route('forRent', $bu->bu_rent)}}" title="@lang('site.bu_rent')">@lang('site.bu_rent')</a><small>{{$bu->getBuRent()}}</small></li></div>
                                                <div class="col-lg-2"><li><a class="" href="{{route('search', ['bu_place' => $bu->bu_place])}}" title="@lang('site.bu_place')">@lang('site.bu_place')</a><small>{{$bu->bu_place}}</small></li></div>
                                                <div class="col-lg-2"><li><a class="" href="{{route('search',['bu_price' =>$bu->bu_price])}}" title="@lang('site.bu_price')">@lang('site.bu_price')</a><small>{{$bu->bu_price}}</small></li></div>
                                            </ul>
                                        </div>
                                    </div>

                                    <img class="card-img-top" src="{{$bu->image_path}}" alt="No Image" title="{{$bu->bu_name}}">

                                    <p>{!!$bu->bu_larg_dis!!}</p>


                                    <div id="map" style="width:100%;height:400px;"></div>
                                    {{-- <div class="col-sm-6 col-lg-4">
                                        <div class="card">
                                            <img class="card-img-top" src="{{asset('front/img/test.jpg')}}">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{$bu->bu_name}}
                                                </h5>
                                                
                                                <h6 class="card-subtitle mb-2 text-muted fl-right"> <span>{{"المساحة "}}{{$bu->bu_square}}</span></h6>
                                                <h6 class="card-subtitle mb-2 text-muted fl-left"> <span>{{$bu->getBuRent()}}</span></h6>
                                                
                                                <p class="card-text p-color card-style-p  clearfix">
                                                    {{$bu->bu_smail_dis}}
                                                </p>
                                                <a href="{{route('singleBuilding',$bu->id)}}" class="button-effect from-top"><span class="color-white"> التفاصيل</span></a>
                                                <span class="span-price">${{$bu->bu_price}}</span>
                                            </div>
                                        </div>
                                    </div>                                     --}}
                                @endforeach
                            @else
                                <h2> @lang('site.no_data_found')</h2>
                            @endif
                        </div>

                        {{-- <div class="content-center">
                            {{$buAll->appends(request()->query())->links()}}
                        </div>   --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End digram -->

    <!-- Start Latest Posts -->
    <div class="latest-post post-info">
        <div class="container">
            <div class="row">
                <h2>أحدث <span class="color-red">مخططاتنا</span></h2>

                @foreach ($sentBuType as $value)
                    <div class="col-md-2 col-lg-2">
                        <div class="image">
                            <div class="over">
                                <h1 class="color-white">{{{$value->bu_name}}}</h1>
                                {{-- <p>{!!$value->bu_smail_dis!!}</p> --}}
                                <h6 class=" h-place">@lang('site.bu_place'){{' '.$value->bu_place}}</h6>
                                <h6 class=" h-rent">{{$value->getBuRent()}}</h6>                                    
                                <span class="spantype">@lang('site.bu_place'){{' '.$value->bu_place}}</span>
                                <span class="spanrent">{{$value->getBuRent()}}</span>
                                <a href="{{route('singleBuilding',$value->id)}}" title="{{$value->bu_name}}"><span class="color-white span-first"> التفاصيل</span></a>
                                <span class="color-white span-last">${{$value->bu_price}}</span>                         
                            </div>
                            <img src="{{$value->image_path}}" alt="No Image">
                        </div>
                    </div>                                      
                @endforeach

                @foreach ($sentBuRent as $value)
                    <div class="col-md-2 col-lg-2">
                        <div class="image">
                            <div class="over">
                                <h1 class="color-white">{{{$value->bu_name}}}</h1>
                                {{-- <p>{!!$value->bu_smail_dis!!}</p> --}}
                                <h6 class=" h-place">@lang('site.bu_place'){{' '.$value->bu_place}}</h6>
                                <h6 class=" h-rent">{{$value->getBuRent()}}</h6>                                
                                <a href="{{route('singleBuilding',$value->id)}}" title="{{$value->bu_name}}"><span class="color-white span-first"> التفاصيل</span></a>
                                <span class="color-white span-last">${{$value->bu_price}}</span>  
                       
                            </div>
                            <img src="{{$value->image_path}}" alt="No Image">
                        </div>
                    </div>                                      
                @endforeach                
            </div>
        </div>
    </div>
    <!-- End Latest Posts -->    
@endsection
@section('scripts')

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-610859c99e1b3634"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // used google maps in this website
        $("#pac-input").focusin(function() {
            $(this).val('');
        });
        $('#latitude').val('');
        $('#longitude').val('');
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: {{$bu->bu_latitude}} , lng: {{$bu->bu_langtude}} },
                zoom: 12,
                mapTypeId: 'roadmap'
            });
            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function() {
                        geocodeLatLng(geocoder, map, infoWindow,marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                console.log('dsdsdsdsddsd');
                handleLocationError(false, infoWindow, map.getCenter());
            }
            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log( results[0].formatted_address);
                            splitLatLng(String(event.latLng));

                            // get resulte from maps you will be used this id in devestion tages
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });
            function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());
                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);
                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
            }
            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function splitLatLng(latLng){
            var newString = latLng.substring(0, latLng.length-1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng  = trainindIdArray[1];
            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlmOqsFj4rHkjq5mL90PzYVPjACdoxUN8&libraries=places&callback=initAutocomplete&language=ar&region=SD
         async defer"></script>
@endsection
