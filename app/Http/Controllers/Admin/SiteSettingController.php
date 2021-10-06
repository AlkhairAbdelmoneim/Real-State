<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Requests\SiteSetting as  SiteSettingRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Validator;

class SiteSettingController extends Controller
{

    public function index(Request $request)
    {

        try {

            $siteSettings = SiteSetting::when($request->search , function($query) use($request){

                return $query->where('name' , 'like' , '%' .$request->search . '%');

            })->latest()->paginate(PAGINATION_COUNT);

            return view('dashboard.site_settings.index', compact('siteSettings'));  

        } catch (\Throwable $th) {

            return $th;
        }        
    }


    public function create()
    {
        try {

        $siteSettings = SiteSetting::all();
        $siteSettings = collect($siteSettings);

        $resultOfFilter =  $siteSettings -> transform(function($value , $key){

            return $value['slug'];

        });

        return view('dashboard.site_settings.create' ,compact('resultOfFilter'));

        } catch (\Throwable $th) {
            
            return $th;
        }
    }


    // public function store(Request $request)
    // {
    //     //
    // }


    // public function show(SiteSetting $siteSetting)
    // {
    //     //
    // }


    public function edit(SiteSetting $setting)
    {

        return view('dashboard.site_settings.edit' , compact('setting'));
    }


    public function update(Request $request,SiteSetting $siteSetting)
    {

        try {

            if ($request->namesetting) { 

                foreach ($request->namesetting as $key => $value) {   

                    $siteSettingUpdate = $siteSetting->where('namesetting' , $key)->get()[0];

                    $siteSettingUpdate->update(['value' => $value]);

                    }
                
            } else {

                $request_data = $request->except(['main_slider']);

                    $siteSettingUpdate = $siteSetting->where('namesetting' , 'main_slider')->get()[0];

                    Storage::disk('public_uploads')->delete('/slider/' .$siteSettingUpdate->value);

                    Image::make($request->main_slider)->save(public_path('uploads/slider/' .$request->main_slider->hashName()) ,60);

                    $request_data['main_slider'] = $request->main_slider->hashName();    

                    $siteSettingUpdate->update(['value' => $request_data['main_slider']]);                 
                    


            }        

            session()->flash('success',__('site.updated_successfully'));

            return redirect()->route('settings.index');   

        } catch (\Throwable $th) {

            return $th;
        }
    }


    function destroy(SiteSetting $setting)
    {

        try {

            $siteSettingUpdate = $setting->where('namesetting' , 'main_slider')->get()[0];

            Storage::disk('public_uploads')->delete('/slider/' .$siteSettingUpdate->value);   

            $setting->delete();
            session()->flash('success',__('site.deleted_successfully'));

            return redirect()->route('settings.index');

        } catch (\Throwable $th) {
            
            return $th;
        }
    }
}
