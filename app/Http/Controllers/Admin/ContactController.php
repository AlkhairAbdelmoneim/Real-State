<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Admin\ContactUs;

class ContactController extends Controller
{

    public function sendMessage()
    {
        return view('front.bu.contact');

    } // end of sendMessage

    public function index(Request $request)
    {
        
        try {
            
            $messages = ContactUs::when($request->search , function($query) use($request){

                return $query->where('name' , 'like' , '%' .$request->search . '%')
                ->orWhere('phone' , 'like' , '%' .$request->search. '%');
    
            })->latest()->paginate(PAGINATION_COUNT);  
            
            dataFilterMessage($messages);
    
            return view('dashboard.contact.index' ,compact('messages'));    

        } catch (\Throwable $th) {
            return $th;
        }

    } // end of index

    public function create()
    {
        //
    }

    public function store(ContactRequest $request)
    {

        try {
            
            $request_data = $request->except(['_token']);
        
            $request_data = ContactUs::create($request_data);
    
            return response()->json(['SuccessMessage' => 'تم إرسال الرسالة بنجاح']);
        
            if (!$request_data) {
                
                return response()->json(['ErrorMessage' => 'هنالك مشكلة ما رجاء حاول مرة اخري']);
            }        $request_data = $request->except(['_token']);
            
            $request_data = ContactUs::create($request_data);
    
            return response()->json(['SuccessMessage' => 'تم إرسال الرسالة بنجاح']);
        
            if (!$request_data) {
                
                return response()->json(['ErrorMessage' => 'هنالك مشكلة ما رجاء حاول مرة اخري']);
            }

        } catch (\Throwable $th) {
            return $th;
        }

    } // end of sore


    // public function show($id)
    // {
    //     //
    // }


    public function edit(ContactUs $contact ,$id)
    {

        try {
            
            $resualt = $contact->where('id' , $id)->get()[0];

            $status = $resualt->status = 1;
            $resualt->update(['status' => $status]);
           
           return view('dashboard.contact.edit',compact('resualt'));

        } catch (\Throwable $th) {
            return $th;
        }

    } // end of edit


    public function update(ContactRequest $request ,ContactUs $contact, $id)
    {
        
        try {
            
            $request_data = $request->except(['_token']);

            $resualt = $contact->where('id' , $id)->get()[0];
    
            $resualt->update($request_data);
    
            session()->flash('success',__('site.updated_successfully'));
    
            return redirect()->route('contact_us.index'); 

        } catch (\Throwable $th) {
            return $th;
        }

    } // end of update

    public function destroy(ContactUs $contact , $id)
    {
        
        try {
            
            $data = $contact->where('id' , $id)->delete();

            session()->flash('success',__('site.deleted_successfully'));
    
            return redirect()->route('contact_us.index'); 

        } catch (\Throwable $th) {
            return $th;
        }
    } // end of destroy
}
