<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Criterion extends Model
{
    protected $table='criterion';//Ignore automatically add "s" into class name to be table name    
    protected $primaryKey='criterionID'; //Ignore automatically query with id as primary key
    public $timestamps = false; // Ignore automatically add create_at/update_at fields into tabl 

}
