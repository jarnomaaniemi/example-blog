<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(
        public $title,
        public $excerpt,
        public $date,
        public $body,
        public $slug
    ) {
    }

    public static function find($slug)
    {
        // From all the posts, find the one with slug that matches the one requested
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);

        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     throw new ModelNotFoundException();
        // }

        // return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            // Laravel collection using Illuminate File Facade (instead of array_map function)
            // Read all files from given directory in resources folder
            // Read (parse) each file with Yaml Front Matter (returns Document object)
            // Create Post object from each Document
            // Maybe a better place for this logic is in Service Provides
            return collect(File::files(resource_path('posts')))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(fn ($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
                ->sortByDesc('date');
        });
    }
}
