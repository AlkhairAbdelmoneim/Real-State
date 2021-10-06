<?php
use App\Models\SiteSetting;
use App\Models\Admin\Building;
use App\Models\Admin\ContactUs;
use Illuminate\Support\Facades\Auth;

function getSetting($settingname = 'sitename'){

    $resault_data = SiteSetting::where('namesetting' , $settingname)->get();

    if ($resault_data->count() <= 0) {

        $resault_data = "not data found";

    } else {

        $resault_data = SiteSetting::where('namesetting' , $settingname)->get()[0]->value;

    } 

    return $resault_data;
}


function dataFilter($data){

    $data->filter(function($value, $key){

        return $value->bu_smail_dis = Str::limit($value->bu_smail_dis , 60);
        
    }); 
    
    return $data;
    
} // end of dataFilter


function dataFilterMessage($data){

    $data->filter(function($value, $key){

        return $value->message = Str::limit($value->message , 20);
        
    }); 
    
    return $data;
    
} // end of dataFilter


function returnResult(){

        $result = Building::where('bu_status' , 1)->orderBy('id' , 'desc')->paginate(PAGINATION_COUNT);

        returnBuRent($result);

        dataFilter($result);

    return $result;
    
} // end of returnResult


function returnResultBy($condition , $data){

    $result = Building::where('bu_status' , 1)->where($condition , $data)->orderBy('id' , 'desc')->paginate(PAGINATION_COUNT);

    dataFilter($result);
    
    return $result;

} // end of returnResultBy

function getUserBuType($data)
{
    $user = Auth::user();

    $buAll = Building::where('user_id' , $user->id)->where('bu_status' , $data)->paginate(PAGINATION_COUNT);

    $buAll = dataFilter($buAll);
    return $buAll;
}


function getBuRent()
{
    $buRent = [
        '0' => 'إيجار',
        '1' => 'شراء',
    ];
    return $buRent;

} // end of getBuRent

function getStatus()
{
    $buRent = [
        '0' => 'غير مفعل',
        '1' => 'مفعل',
    ];
    return $buRent;

} // end of getBuRent


function getBuType()
{
    $buType = [
        '0' => 'فيلا',
        '1' => 'شقة',
        '2' => 'دكان',
    ];
    return $buType;

} // end of getBuType

function getTypeLike()
{
    $buType = [
        '0' => 'إعجاب',
        '1' => 'إقتراح',
        '2' => 'إستفسار',
        '3' => 'مشكلة',
    ];
    return $buType;

} // end of getBuType


function messages($type)
{
    if ($type == 'unreadMessage') {
        
        $result = ContactUs::where('status' , 0)->take(3)->get();

        $result->filter(function($value, $key){

            return $value->message = Str::limit($value->message , 20);

        });

        return $result;

    } else if ($type == 'countMessage') {
        
        return ContactUs::where('status' , 0)->count();

    }  // ens of if

} // end of UnReadMessages


function getBuPlace()
{
    
    $buPlace =[

    '0' => 'أسوان', 
    '1' => 'ابو الريش',
    '2' => 'ابو سمبل',
    '3' => 'البصيلية',      
    '4' => 'السباعية',       
    '5' => 'صحارى',        
    '6' => 'كوم امب', 
    '7' => 'نصر النوب', 
    '8' => 'أبنوب',       
    '9' => 'الفتح',       
    '10' => 'بحرى والأنفوش', 
    '11' => 'بولكلي', 
    '12' => 'كامب شيزا', 
    '13' => 'إدكو',    
    '14' => 'كل الدقهلي', 
    '15' => 'الكردى', 
    '16' => 'الخرطوم', 
    '17' => 'بحري' 
    ];
    
    return $buPlace;
}

function getBuUserCount($user_id , $bu_status)
{
    return Building::where('user_id', $user_id)->where('bu_status' , $bu_status)->count();
}

function getBuActiveOrNot($status)
{
    return Building::where('bu_status' , $status)->count();
}

function getBuStatusWitting()
{
    return Building::where('bu_status' , 0)->take(5)->get();
}

function getTime($time)
{
    return date_format($time , 'Y-m-d g:i') ;
}


function strReplace($data)
{
    return trim(str_replace(' ' ,'_' ,$data));
}


// function setActive($array)
// {

//     if (!empty($array)) {
        
//         $seg_array =[];
//         foreach ($array as $key => $value) {


//             if (Request::segment($key+1)  == $value) {
                
//                 $seg_array[] = $key;
//             }
            
//         }

//         // dd($seg_array);
//         if (count($seg_array) == count(Request::segments())) {
            
//             return "active";
//         }
//     }
// }
