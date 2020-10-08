<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'articleName' => 'required|string|min:10',
                'articleImg'               => 'required|active_url',
                'articleContent'          => 'required'
            ]);
            
            $request->validated;
            Articles::create([
                'user_id' => auth()->user()->id,
                'name' => $request->articleName,
                'imageUrl' => $request->articleImg,
                'content' => $request->articleContent
            ]);
            return 'good';

    }

    public function show(Articles $articles)
    {
        return $articles->all();
    }

    public function update(Request $request)
    {
        $articles = Articles::where('id','=',$request->articleId)->first();
        $articles->content = $request->articleContent;
        $articles->imageUrl = $request->articleImg;
        $articles->name = $request->articleName;
        $articles->save();
        return 'good';
    }

    public function deletearticle(Request $request){
        $articles = new Articles;
        return $articles->deleteArticle($request->id);
    }


    public function getmyarticles(Articles $articles){
        return $articles->where('user_id',auth()->user()->id)->get();
    }
}
