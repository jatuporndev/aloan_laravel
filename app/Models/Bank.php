<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bank extends Model
{
    protected $table='loaner_bank';//Ignore automatically add "s" into class name to be table name    
    protected $primaryKey='bankID'; //Ignore automatically query with id as primary key
    public $timestamps = false; // Ignore automatically add create_at/update_at fields into tabl 

}
