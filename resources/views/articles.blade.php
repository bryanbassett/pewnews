
@extends('layouts.app')
@section('page_title')
 - Home
@endsection
@section('content')
        
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
           
    <div class="flex flex-wrap">
                @foreach($articles as $article)
               
                <div class="w--1/3 sm:w-full md:w-1/3 p-4 ">
                    <a href="{{ url('/articles/'.$article->id) }}">
                            <div class="bg-white border rounded-lg overflow-hidden">
                                
                                <img class="h-48 w-full object-cover" src="{{ $article->imageUrl }}" alt="{{ $article->name }}">
                                <div class="p-6">
                                    <div class="flex justify-center sm:justify-start sm:pt-0">
                                        <div class="text-2xl">{{ $article->name }}</div>
                                    
                                    </div>
                                <div class="flex items-baseline">
       
                                    <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                                    Written:  {{ date('m',strtotime($article->created_at)) }}&bull;{{ date('d',strtotime($article->created_at)) }}&bull;{{ date('y',strtotime($article->created_at)) }}
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                        </a>

                            
          
                    </div>
         
                @endforeach
            </div>
    </div>
                @endsection

              

                   