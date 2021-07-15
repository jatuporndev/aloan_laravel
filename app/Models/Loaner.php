<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Loaner extends Model
{
    protected $table='loaners';//Ignore automatically add "s" into class name to be table name    
    protected $primaryKey='LoanerID'; //Ignore automatically query with id as primary key
    public $timestamps = false; // Ignore automatically add create_at/update_at fields into tabl 
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
        'image',
        'image_IDCard',
        'imageProfile',
        'signature',
        'email',
        'password',
        'verify',
    ];
    public static function login($email,$password)
    {
        return DB::table('loaners')
                ->select('*')
                ->where('email', $email)
                ->Where('password', $password)
               // ->Where('isActive', 1)
                ->first();
    }
    public static function data($email)
    {
        return DB::table('loaners')
                ->select('*')
                ->where('email', $email)
                ->orderBy('LoanerID', 'desc')
               // ->Where('isActive', 1)
                ->first();
    }
}
