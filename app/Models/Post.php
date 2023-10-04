<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Class Post{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title,$excerpt,$date,$body,$slug){
        $this->title=$title;
        $this->excerpt=$excerpt;
        $this->date=$date;
        $this->body=$body;
        $this->slug=$slug;

    }

    public static function all(){
        $files= collect(File::files(resource_path("posts")));
        return $files->map(function ($file){
            $parsed = YamlFrontMatter::parseFile($file);
            return $parsed;
            
            
        })->map(fn($document)=> new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        ))
        
        ->sortByDesc('date');

        return cache()->remember('post.all', now()->addSeconds(20), function(){
            $files= collect(File::files(resource_path("posts")))
            ->map(function ($file) {
                dd($file);
                $parsed = YamlFrontMatter::parseFile($file);
                dd($parsed);
                return $parsed;
            })
            // ->map(fn($file)=>YamlFrontMatter::parseFile($file))
            ->map(fn($document)=> new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))
            ->sortByDesc('date');
        });

    }

    public static function find($slug) {
        //dd(static::all());
        return static::all()->first(function ($post) use ($slug) {
            return $post->slug === $slug;
        });
    }
    
}