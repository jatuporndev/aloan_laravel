<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model
{
    protected $table='article';//Ignore automatically add "s" into class name to be table name    
    protected $primaryKey='ArticleID'; //Ignore automatically query with id as primary key
    public $timestamps = false; // Ignore automatically add create_at/update_at fields into tabl 

}
