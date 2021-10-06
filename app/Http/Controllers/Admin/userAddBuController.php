<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BuRequest;
use App\Models\Admin\Building;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Auth;
use Str;
use Validation;

class userAddBuController extends Controller
{
    public function create()
    {
        $user = 2;

        return view('dashboard.userbu.create' ,compact('user'));

    } // end of ShowUserAdd

    
    public function store(BuRequest $request)
    {

        $request_data = $request->all();

        $user = Auth::user() ? Auth::user()->id : 0;

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
                'bu_larg_dis' => strip_tags(Str::limit($request_data['bu_larg_dis'], 160, '...')),
                'bu_meta'     => $request_data['bu_meta'],
                'bu_langtude' => $request_data['bu_langtude'],
                'bu_latitude' => $request_data['bu_latitude'],
                'bu_image'   => $request_data['bu_image'], 
                'user_id'     => $user ,
                'month' => date('m') ,
                'year' => date('Y'),  
            ];
            Building::create($data);
            
            return response()->json(['message' => 'تم إضافة العقار بنجاح']);


        } // end of if


        // try {

            $data = [
                'bu_name'     => $request_data['bu_name'],
                'bu_place'     => $request_data['bu_place'],
                'bu_square'   => $request_data['bu_square'],
                'rooms'       => $request_data['rooms'],
                'bu_price'    => $request_data['bu_price'],
                'bu_rent'     => $request_data['bu_rent'],
                'bu_type'     => $request_data['bu_type'],
                'bu_larg_dis' => strip_tags(Str::limit($request_data['bu_larg_dis'], 160, '...')),
                'bu_meta'     => $request_data['bu_meta'],
                'bu_langtude' => $request_data['bu_langtude'],
                'bu_latitude' => $request_data['bu_latitude'],
                'user_id'     => $user    
            ];
            Building::create($data);
            
            return response()->json(['message' => 'تم إضافة العقار بنجاح']);

        // } catch (\Throwable $th) {

        //     return $th;
        // }

    } // end of UserStore


    public function edit($id ,Building $building)
    {

        $user_id = Auth::user()->id;

        $data = $building->where('id' , $id)->get();

        foreach ($data as $key => $value) {
            
            $buInfo = $value;
        }     

        if ($user_id != $buInfo->user_id) {

            $messageBody = "العقار غير موجود :)";

            return view('front.bu.nopermision' ,compact('messageBody'));

        }elseif ($buInfo->bu_status == 1) {

            $messageBody = "لا يمكنك التعديل علي هذا العقار حاليا اذا اردت التعديل عليه برجاء الذهاب الي إتصل بنا أعلي الصفحة وطلب التعديل";

            return view('front.bu.nopermision' ,compact('messageBody'));
        }

        // return $data->image_path;
        $user = 2;

        return view('dashboard.userbu.edit', compact('buInfo' ,'user'));

    } // end of editUserBu

    public function update(BuRequest $request ,Building $building)
    {
        $request_data  = $request->except(['_token' ,'_method']);

        $user_data = $building->where('id' ,$request->id)->get()[0];

        if ($request->bu_image) {
            
            if ($request->bu_image != 'default.jpg') {
                
                Storage::disk('public_uploads')->delete('/img/' .$user_data->bu_image);

                Image::make($request->bu_image)->resize(800, 700)->save(public_path('uploads/img/' .$request->bu_image->hashName()));

                $request_data['bu_image'] = $request->bu_image->hashName();                
            }
        }

        $user_data->update($request_data);

        return redirect('showuserbu')->with( 'success','تم تعديل معلومات العقار بنجاح');

    }// end of update


    public function ShowbuActive()
    {
        $buAll = getUserBuType(1);

        return view('dashboard.userbu.showuserbu' ,compact('buAll'));

    } // end of ShowbuActive

    
    public function ShowbuNotActive()
    {
        $buAll = getUserBuType(0);

        return view('dashboard.userbu.showuserbu' ,compact('buAll'));

    } // end of ShowbuNotActive    


    public function editUserInfo(User $user)
    {
        $user_id = Auth::user()->id;

        $user_data = $user->where('id' , $user_id)->get();

        $user = $user_data->transform(function ($value , $key)
        {

            $data = [];
            $data['name'] = $value['name'];
            $data['email'] = $value['email'];
            
            return $data;
            
        });

        $user = $user[0];
        return view('dashboard.profile.edit' ,compact('user'));
        
    } // end of edit


    public function updateUserInfo(Request $request ,User $user)
    {

        $user_id = Auth::user()->id;

        $user_data = $user->where('id' , $user_id)->get()[0];

        $request_data = $request->all();

        $request_data = $request->validate([

            'name' => 'required|string|max:30',
            'new_password' => 'nullable|min:6',
            'email' => 'required|email|unique:users,email,'.$user_data['id'],
        ]);        

        if ($request_data['name'] == $user_data['name'] && $request_data['email'] == $user_data['email'] && $request_data['new_password'] == null) {

            return redirect('UserEditInfo')->with( 'error',' ليس هنالك اي تعديل ؟');

        } // end of if


        if ($request_data['new_password'] != null) {

            $password = $request_data['new_password'] = Hash::make($request_data['new_password']);
            
            $user_data->update(['password' => $password]);

        } // end of if

            $user_data->update([
                'name' => $request_data['name'],
                'email' => $request_data['email'],
            ]);
    
        return redirect('UserEditInfo')->with( 'success','تم تعديل المعلومات الشخصيه بنجاح');

    } // end of updateUserInfo
}
