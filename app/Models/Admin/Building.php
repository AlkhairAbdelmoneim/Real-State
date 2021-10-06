<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $table = "buildings";
    protected $fillable = ['bu_name','bu_place','bu_price','bu_rent','bu_square','rooms','bu_smail_dis',
    'bu_meta','bu_langtude','bu_latitude','bu_larg_dis','bu_type','bu_status','bu_image','user_id' ,'month' ,'year'];   
    protected $appends = ['image_path'];

    public function getStatusbu()
    {
        return $this->bu_status == 1 ? "مفعل" : "غير مفعل";
    }

    public function getType()
    {

        $type = $this->bu_type;

            switch ($type) {
                case 0:
                    return "فيله";
                    break;

                case 1:
                    return "شقه";
                    break;
                
                case 2:
                    return "دكان";
                    break;                    
            }

            return $type;

    }

    function getBuRent()
    {
        $buRent = $this->bu_rent;

        return $buRent == 1 ? $buRent = 'تمليك' : $buRent = 'إيجار'; ;

    }

    function getImagePathAttribute(){

        return asset('uploads/img/' .$this->bu_image);
        
    }

}
