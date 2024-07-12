<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class Todo extends Model
{
    use HasFactory;
    
    public static function getTodos(){
        
        $value = auth()->user()->id;
        error_log($value);
        $todo = DB::table('todos')
                ->where('user_id', '=', $value)
                ->get();
                // error_log($todo);   
                return $todo;
    }
}
