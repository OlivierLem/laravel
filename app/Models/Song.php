<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table= "songs";

    public function user(){
        // SELECT * FROM users WHERE users.id=$this->user_id
        return $this->belongsTo("App\Models\User","user_id");
    }
    public function ILikeThem(){
        /* return $this->belongsTo"App\Models\User","likes","user_id","song_id"); */
    }
    
}
