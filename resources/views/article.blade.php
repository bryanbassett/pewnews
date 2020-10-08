@extends('layouts.app')
@section('page_title')
 - {{ $article->name }}
@endsection
@section('content')


                <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1">
                       
                        <div class="bg-white border rounded-lg overflow-hidden">
                            
                            <img class="h-48 w-full object-cover" src="{{ $article->imageUrl }}" alt="{{ $article->name }}">
                            <div class="p-6">
                                <div class="flex justify-center sm:justify-start sm:pt-0">
                                    <div class="text-4xl">{{ $article->name }}</div>
                                   
                                </div>
                              <div class="flex items-baseline">
                                <a href="mailto:{{ $article->user->email }}">
                                    <span class="inline-block bg-teal-200 text-teal-800 text-xs px-2 rounded-full uppercase font-semibold tracking-wide">By 
                                     {{ $article->user->name }} 
                                    </span>
                                </a>
                                <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
                                  Written:  {{ date('m',strtotime($article->created_at)) }}&bull;{{ date('d',strtotime($article->created_at)) }}&bull;{{ date('y',strtotime($article->created_at)) }}
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    {!!$article->content !!}
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>

               @endsection