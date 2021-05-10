<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable=[
        'title', 'director', 'country', 'overview', 'release_date' ,'poster', 'subtitles'
    ];
    function user(){
        return $this->belongsTo(User::class);
    }
    function deletePoster(){
        if(!$this->poster)
            return;
        $path=storage_path('app/' . $this->poster);

        if(file_exists($path))
            unlink($path);
    }
    function deleteSubtitles(){
        if(!$this->subtitles)
            return;
        $path=storage_path('app/' . $this->subtitles);

        if(file_exists($path))
            unlink($path);
    }
}
