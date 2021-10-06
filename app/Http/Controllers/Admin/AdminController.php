<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Building;
use App\Models\Admin\ContactUs;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    public function index(Building $building , User $user , ContactUs $contactUs)
    {
        $usersCount = $user->count();
        $buActive  = getBuActiveOrNot(1);
        $bunotActive  = getBuActiveOrNot(0);
        $contactUsCount = $contactUs->count();
        $latestUser = $user->take(5)->orderBy('id' , 'desc')->get();
        $latestBu = $building->take(4)->orderBy('id' , 'desc')->get();
        $latestMessage= $contactUs->take(3)->orderBy('id' , 'desc')->get();
        $mapping = $building->select('bu_langtude' ,'bu_latitude' ,'bu_name')->get();

        $chart = $building->select(DB::raw('COUNT(*) as counting , month'))->where('year' , date('Y'))
        ->groupBy('month')->orderBy('month' ,'ASC')->get()->toArray();

        $array = []; 
        if (isset($chart[0]['month'])) {
            
            for ($i=1; $i < $chart[0]['month']; $i++) { 

                $array[] = 0;
            }
        }

        $new = array_merge($array , $chart);
        
        return view('dashboard.welcome', compact('usersCount' ,'buActive' ,'bunotActive' ,
        'contactUsCount' ,'mapping' ,'new' ,'latestUser' ,'latestBu' ,'latestMessage'));
    }

    public function showYear(Building $building , Request $request)
    {
   
        $year = $request->year;
        $chart = $building->select(DB::raw('COUNT(*) as counting , month'))->where('year' , $year)
        ->groupBy('month')->orderBy('month' ,'ASC')->get()->toArray();

        $array = [];

        if (isset($chart[0]['month'])) {
            
            for ($i=1; $i < $chart[0]['month']; $i++) { 

                $array[] = 0;
            }
        } 

        $new = array_merge($array , $chart);

        return view('front.bu.show-year' ,compact( 'year','new'));

    }
}
