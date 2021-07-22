<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Borrowers extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table='borrowers';
    protected $primaryKey='BorrowerID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'address',
        'gender',
        'birthday',
        'job',
        'married',
        'IDCard',
        'IDCard_back',
        'bank',
        'IDBank',
        'LineID',
        'salary',
        'image_face',
        'image_IDCard',
        'imageProfile',
        'signature',
        'email',
        'password',
        'verify',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPictureAttributes($value){
        if($value){
            return asset('assets/uploadfile/Borrower/profile/'.$value);
        }else{
            return asset('assets/uploadfile/Borrower/profile/no-image.png');
        }
    }
}
