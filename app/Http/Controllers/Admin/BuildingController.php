<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Building;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\BuRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Auth;

class BuildingController extends Controller
{

    public function index(Request $request)
    {

        try {
        
        $id = $request->id;

        if ($id) {

            $building = Building::where('user_id' ,$request->id)->when($request->search , function($query) use($request){

                        return $query->where('bu_name' , 'like' , '%' .$request->search . '%')
                        ->orWhere('bu_rent' , 'like' , '%' .$request->search. '%');
        
                    })->latest()->paginate(PAGINATION_COUNT);  

            return view('dashboard.building.index' ,compact('building','id'));  
        }

        
            $building = Building::when($request->search , function($query) use($request){

                return $query->where('bu_name' , 'like' , '%' .$request->search . '%')
                ->orWhere('bu_rent' , 'like' , '%' .$request->search. '%');

            })->latest()->paginate(PAGINATION_COUNT);        

            return view('dashboard.building.index' ,compact('building'));  

        } catch (\Throwable $th) {

            return $th;
        }
    }


    public function create()
    {
        return view('dashboard.building.create');
    }

 
    public function store(Request $request)

    {

        $request_data = $request->all();

        $user = Auth::user()->id;

        if ($request->bu_image) {

            Image::make($request->bu_image)->resize(800, 700)->save(public_path('uploads/img/' .$request->bu_image->hashName()));

            $request_data['bu_image'] = $request->bu_image->hashName();

            $data = [
                'bu_name'     => $request_data['bu_name'],
                'bu_place'     => $request_data['bu_place'],
                'bu_square'   => $request_data['bu_square'],
                'rooms'       => $request_data['rooms'],
                'bu_price'    => $request_data['bu_price'],
                'bu_rent'     => $request_data['bu_rent'],
                'bu_type'     => $request_data['bu_type'],
                'bu_smail_dis'=> $request_data['bu_smail_dis'],
                'bu_larg_dis' => $request_data['bu_larg_dis'],
                'bu_meta'     => $request_data['bu_meta'],
                'bu_langtude' => $request_data['bu_langtude'],
                'bu_latitude' => $request_data['bu_latitude'],
                'bu_status'   => $request_data['bu_status'],
                'bu_image'   => $request_data['bu_image'],
                'user_id'     => $user  ,
                'month' => date('m'),
                'year' => date('Y'),
            ];   
            Building::create($data);

            session()->flash('success',__('site.created_successfully'));

            return redirect()->route('building.index');  

        } // end of if


        try {

            $data = [
                'bu_name'     => $request_data['bu_name'],
                'bu_place'     => $request_data['bu_place'],
                'bu_square'   => $request_data['bu_square'],
                'rooms'       => $request_data['rooms'],
                'bu_price'    => $request_data['bu_price'],
                'bu_rent'     => $request_data['bu_rent'],
                'bu_type'     => $request_data['bu_type'],
                'bu_smail_dis'=> $request_data['bu_smail_dis'],
                'bu_larg_dis' => $request_data['bu_larg_dis'],
                'bu_meta'     => $request_data['bu_meta'],
                'bu_langtude' => $request_data['bu_langtude'],
                'bu_latitude' => $request_data['bu_latitude'],
                'bu_status'   => $request_data['bu_status'], 
                'user_id'     => $user    
            ];
            Building::create($data);

            session()->flash('success',__('site.created_successfully'));

            return redirect()->route('building.index');  

        } catch (\Throwable $th) {

            return $th;
        }
    }


    // public function show(Building $building)
    // {
    //     //
    // }


    public function edit(Building $building , User $user)
    {

        $user_data = $user->where('id' , $building->user_id)->get();

        $user_info = $user_data->transform(function($value , $key){

            $data = [];
            $data['name'] = $value['name'];
            $data['email'] = $value['email'];

            return $data;
        });

        return view('dashboard.building.edit' , compact('building' ,'user_info'));
    }


    public function update(BuRequest $request, Building $building)
    {

        $request_data = $request->all();

        if ($request->bu_image) {
            
            if ($request->bu_image != 'default.jpg') {
                
                Storage::disk('public_uploads')->delete('/img/' .$building->bu_image);

                Image::make($request->bu_image)->resize(800, 700)->save(public_path('uploads/img/' .$request->bu_image->hashName()));

                $request_data['bu_image'] = $request->bu_image->hashName();                
            }
        }
        
        try {
            $building->update($request_data);

            session()->flash('success',__('site.updated_successfully'));

            return redirect()->route('building.index');  

        } catch (\Throwable $th) {

            return $th;
        }
    }


    public function destroy(Building $building)
    {
 
        try {

            if ($building->bu_image != 'default.jpg') {
            
                Storage::disk('public_uploads')->delete('/img/' .$building->bu_image);
            }           
            
            $building->delete();

            session()->flash('success',__('site.deleted_successfully'));

            return redirect()->route('building.index');  

        } catch (\Throwable $th) {

            return $th;
        }
    } // end of destroy
    
}
