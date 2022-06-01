<?php
namespace App\Models;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post{
    public $title;
    public $date;
    public $slug;
    public $body;

    public function __construct($title, $date, $slug,$body)
    {
        $this->title = $title;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }

    public static function find($slug)
    {
          $posts = static ::all();
          return $posts->firstWhere('slug',$slug);
    }

    public static function all()
    {
        $files = File::files(resource_path("posts"));
        $posts=collect($files)->map(function ($file){
            return $document = YamlFrontMatter::parseFile($file);
        })->map(function ($document){
            return $posts[]= new Post(
                $document->title,
                $document->date,
                $document->slug,
                $document->body()
            );
        });
        return $posts;
    }
}
