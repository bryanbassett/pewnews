<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'imageUrl', 'content','user_id'
    ];

    public function myArticles($id){
        return Articles::where('user_id',$id)->all();
    }
}
