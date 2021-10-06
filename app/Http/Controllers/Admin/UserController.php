<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdmineditRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\Building;

class UserController extends Controller
{

    public function index(Request $request)
    {

        try {

            $users = User::when($request->search , function($query) use($request){

                return $query->where('name' , 'like' , '%' .$request->search. '%');

            })->latest()->paginate(PAGINATION_COUNT);

            return view('dashboard.users.index', compact('users'));  

        } catch (\Throwable $th) {

            return $th;
        }
    }


    public function create()
    {
        return view('dashboard.users.create');
    }


    public function store(AdminRequest $request)
    {

        try {

            $request_data = $request->all();

            if (isset($request->admin) && $request->admin === "admin") {
                
                $request_data['admin'] = 1;
            }else {
                $request_data['admin'] = 0;
            }

            $request_data['password'] = Hash::make($request_data['password']);
            
            User::create($request_data);

            session()->flash('success',__('site.added_successfully'));

            return redirect()->route('users.index');  

        } catch (\Throwable $th) {
            
            return $th->getMessage();
        }
    }


    // public function show(User $user)
    // {
    //     //
    // }


    public function edit(User $user , Building $building)
    {
        $bunotacitve = $building->where('user_id' , $user->id)->where('bu_status' , 0)->paginate(PAGINATION_COUNTBU);
        $buactive = $building->where('user_id' , $user->id)->where('bu_status' , 1)->paginate(PAGINATION_COUNTBU);

        return view('dashboard.users.edit' ,compact('user' ,'buactive' ,'bunotacitve'));
    }


    public function update(Request $request, User $user)
    {

        $request_data = $request->validate([

            'name' => 'required|string|max:30',
            'new_password' => 'nullable|min:6',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);         
        
        if ($request_data['name'] == $user->name && $request_data['email'] == $user->email && $request_data['new_password'] == null) {

            return redirect()->route('users.edit' ,$user->id)->with( 'error',' ليس هنالك اي تعديل ؟');

        } // end of if        

        if ($request_data['new_password'] != null) {

            $password = $request_data['new_password']= Hash::make($request_data['new_password']);
            
            $user->update(['password' => $password]);

        } // end of if

            $user->update([
                'name' => $request_data['name'],
                'email' => $request_data['email'],
            ]);

            session()->flash('success',__('site.updated_successfully'));

            return redirect()->route('users.index');  

        try {
            $user->update($request->all());

    

        } catch (\Throwable $th) {
            
            return $th->getMessage();
        }
    }


    public function destroy( User $user)
    {

        try {

            Building::where('user_id' , $user->id)->delete();

            $user->delete();

            session()->flash('success',__('site.deleted_successfully'));

            return redirect()->route('users.index');    

        } catch (\Throwable $th) {

            return $th->getMessage();
        }   
    }


    public function changeStatus(Building $building , $id )
    {
    
        $bu = $building->where('id' , $id)->get()[0];


        $status = $bu['bu_status'];
        $status == 0 ? $status = 1: $status = 0;

        $bu->update(['bu_status' => $status]);

        session()->flash('success',__('site.updated_successfully'));

        return redirect()->back();  
        
    } // end of changeStatus

}
