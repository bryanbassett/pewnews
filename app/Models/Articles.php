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

    public function getArticle($articleid)
    {   
        $article = Articles::where('id',$articleid)->first();
        $user = User::where('id',$article->user_id)->first();
        $article['user']=$user;
        return $article;
    }

    public function deleteArticle($id){
        $article = Articles::where('id',$id)->first();
        $article->delete();
        return 'good';
    }

    public function getArticles()
    {   
        $articles = Articles::all();
        return $articles;
    }
}
