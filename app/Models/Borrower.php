<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Borrower extends Model
{
    protected $table='borrowers';//Ignore automatically add "s" into class name to be table name    
    protected $primaryKey='BorrowerID'; //Ignore automatically query with id as primary key
    public $timestamps = false; // Ignore automatically add create_at/update_at fields into tabl 

    public static function login($email,$password)
    {
        return DB::table('borrowers')
                ->select('*')
                ->where('email', $email)
                ->Where('password', $password)
               // ->Where('isActive', 1)
                ->first();
    }
    public static function data($email)
    {
        return DB::table('borrowers')
                ->select('*')
                ->where('email', $email)
                ->orderBy('BorrowerID', 'desc')
               // ->Where('isActive', 1)
                ->first();
    }
}
