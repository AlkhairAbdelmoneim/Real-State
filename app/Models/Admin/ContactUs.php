<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = "conact-us";
    protected $fillable = ['name','email','phone','address','message','contact_type','status'];    
    
    public function getStatus()
    {
        return $this->status == 0 ? ' رسالة جديدة' : 'رسالة قديمة';
    }

}