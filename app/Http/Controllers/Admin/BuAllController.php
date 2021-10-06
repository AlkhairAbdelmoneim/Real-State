<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Building;
use Illuminate\Support\Str;
use DB;

class BuAllController extends Controller
{

    public function welcome(Building $building)
    {
        $bu = $building->where('bu_status' , 1)->take(4)->get();
        $result = $building->where('bu_status' , 1)->orderBy('created_at' , 'desc')->skip(1)->take(3)->get();

        $firstBu = dataFilter($result);

        $lastBu = $building->where('bu_status' , 1)->orderBy('created_at' , 'desc')->take(6)->get();

        return view('index' , compact('bu','lastBu','firstBu'));
    }

    function showAllEnable(){

        $data = Building::where('bu_status' , 1)->orderBy('id' , 'desc')->paginate(PAGINATION_COUNT);

        $buAll = dataFilter($data);

        return view('front.bu.all' ,compact('buAll'));
    }


    public function forRent(Request $request)
    {
        foreach ($request->except(['_token']) as $key => $value) {
            $result = $key;
        }
        $buAll = Building::where('bu_status' , 1)->where('bu_rent' , $result)->orderBy('id' , 'desc')->paginate(PAGINATION_COUNT);

        $buAll = dataFilter($buAll);

        return view('front.bu.all' ,compact('buAll'));
    }

    public function byRent()
    {

        $buAll = returnResultBy('bu_rent' , 'إيجار');

        return view('front.bu.all' ,compact('buAll'));
    } 
    
    public function showType($type)
    {

        $buAll = returnResultBy('bu_type' , $type);
        

        return view('front.bu.all' ,compact('buAll'));
    }

    public function search(Request $request)
    {

        $request_data = $request->except(['_token' , '_method','page']);
         
        $query = Building::select('*');

        $count = count($request_data);
        
        $i = 0;

        foreach ($request_data as $key => $value) {

            $i ++;

            if ($value != "") {

                if ($key == 'bu_price_from' && $request->bu_price_to == '') {

                    $query->where('bu_price' , '>=' , $value);

                } elseif ($key == 'bu_price_to' && $request->bu_price__from == '') {
                    
                    $query->where('bu_price' , '<=' , $value);

                } else {

                    if ($key != 'bu_price_from' && $key != 'bu_price_to') {
                        
                        $query->where($key , $value);
                        
                    }
                    
                }

            }elseif ($count == $i && $request->bu_price_to != "" && $request->bu_price__from != "") {
                
                $query->whereBetween('bu_price',[$request->bu_price__from , $request->bu_price_to])->get();
            }

        }

        $data = $query->paginate(PAGINATION_COUNT);

        $buAll = dataFilter($data);

       return view('front.bu.all' ,compact('buAll'));
    }

    function singleBuilding($id , Building $building)
    {

        $buInfo = $building->where('id', $id)->get();

        if ($buInfo->count() < 1) {

            return view('front.bu.error');

        }

            foreach ($buInfo as $key => $value) {
            
                $data = $value;
            }

    
            if ($data->bu_status == 0) {
    
                $messageBody = "العقار $data->bu_name في إنتظار موافقة الإدرة يتم نشر العقار خلال 24 ساعة وشكراً ";
    
                return view('front.bu.nopermision', compact('messageBody'));
    
            }
        

        $sentBuRent = $building->where('bu_rent' ,$data->bu_rent)->take(3)->get();
        $sentBuType = $building->where('bu_type' ,$data->bu_type)->take(3)->get();

        return view('front.bu.singleBu', compact('buInfo' ,'sentBuRent' ,'sentBuType'));
    }

    public function getAjaxInfo(Request $request , Building $building)
    {
        $data =  $building->find($request->id);

        $data->bu_smail_dis = Str::limit($data->bu_smail_dis , 160);

        return $data->toJson();
    }

    public function aboutUs(Building $building)
    {
        $lastBu = $building->where('bu_status' , 1)->orderBy('created_at' , 'desc')->take(6)->get();
        return view('front.bu.about-us' ,compact('lastBu'));
    }
}
