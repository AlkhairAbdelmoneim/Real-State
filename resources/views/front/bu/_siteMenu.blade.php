                <div class="col-md-4 fl-right">
                    <div class="side_menu">

                        @if (Auth()->user())
                        <h4>خيارات العضو</h4>
                            <ul>
                                
                                <li><a href="{{route('showuserbu')}}" title="@lang('site.bu_active')">العقارات المفعلة<small class="small fl-left">{{getBuUserCount(Auth()->user()->id , 1)}}</small></a></li>
                                <li><a href="{{route('ShowbuNotActive')}}" title="@lang('site.bu_notactive')"> العقارات الغير مفعلة <small class="small fl-left">{{getBuUserCount(Auth()->user()->id , 0)}}</small></a></li>
                                <li><a href="{{route('UserEditInfo')}}" title="@lang('site.updateInfo')">تعديل المعلومات الشخصية</a></li>
                                <li><a href="{{route('userbucreate')}}" title="@lang('site.addBu')">أضف عقار</a></li>
                            </ul>
                        @endif
                        
                        <div class="form-search">
                            <h4>@lang('site.buildingSearch')</h4>
                            
                            <form action="{{route('search')}}" method="GET">
                                @csrf
                                
                                <div class="form-group">
                                    <input type="text" name="bu_price_from" class="form-control" placeholder="@lang('site.bu_priceFrom')">
                                </div>    
                                
                                <div class="form-group">
                                    <input type="text" name="bu_price_to" class="form-control" placeholder="@lang('site.bu_priceTo')">
                                </div>                                                                

                                <div class="form-group">
                                    <input type="text" name="bu_square" class="form-control" placeholder="@lang('site.bu_square')">
                                </div>   

                                <div class="form-group">
                                    <select name="bu_type" class="form-control" style="height: 40px">
                                        <optgroup label="@lang('site.bu_type')">
                                            <option value="" disabled selected hidden >@lang('site.bu_type')...</option>
                                                @foreach (getBuType() as $key => $value)
                                                    <option value="{{$key}}" >{{$value}}</option>
                                                @endforeach                                            
                                        </optgroup>
                                    </select>
                                </div>                                
                        
                                <div class="form-group">
                                    <select name="bu_place" class="form-control select2" style="height: 40px;">
                                        <option value="" disabled selected hidden >@lang('site.bu_place')...</option>
                                            @foreach (getBuPlace() as $value)
                                                <option value="{{$value}}" >{{$value}}</option>
                                            @endforeach                                            
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="bu_rent" class="form-control" style="height: 40px; margin-top: 20px">
                                        <optgroup label="@lang('site.bu_rent')">
                                            <option value="" disabled selected hidden >@lang('site.bu_rent')...</option>
                                                @foreach (getBuRent() as $key => $value)
                                                    <option value="{{$key}}" >{{$value}}</option>
                                                @endforeach                                            
                                        </optgroup>
                                    </select>
                                </div>                                

                                <div class="form-group">
                                    <select name="rooms" class="form-control" style="height: 40px">
                                        <optgroup label="@lang('site.rooms')">
                                        <option disabled selected hidden >@lang('site.rooms')...</option>
                                            @for ($i = 2; $i <= 40; $i++)
                                                <option value="{{$i}}" >{{$i .' '."غرفة"}}</option>
                                            @endfor                                            
                                        </optgroup>
                                    </select>
                                </div>                                                           
                        
                                <div class="form-group">
                                    <button type="submit" class="btn button-effect from-top"><i class=" fa fa-search">@lang('site.search')</i></button>
                                </div>                             
                            </form>                             
                        </div>                                              
                        <h4>@lang('site.building')</h4>
                        <ul>
                            <li><a href="{{route('showAllBuilding')}}" id="getAllBu" title="@lang('site.Allbuilding')">@lang('site.Allbuilding')</a></li>
                            @foreach (getBuRent() as $key => $value)
                                <li><a href="{{route('forRent',$key)}}" title="{{$value}}">{{$value}}</a></li>
                            @endforeach
                        
                            @foreach (getBuType() as $key => $value)
                                <li><a href="{{route('type',$key)}}" title="{{$value}}">{{$value}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
