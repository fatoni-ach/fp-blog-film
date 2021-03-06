<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_film extends Model
{
    public function ratings()
    {
        return $this->belongsToMany('App\Profil', 'ratings', 'post_film_id', 'profil_id')->withPivot('point');
    }
    public function profil()
    {
        return $this->belongsTo('App\Profil');
    }
    public function pemains()
    {
        return $this->hasMany('App\Pemain');
    }
    public function komentars()
    {
        return $this->hasMany('App\Komentar');
    }
    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'film_genres', 'post_film_id', 'genre_id');
    }
    public function getImage()
    {
        return 'img/post_film/'. $this->foto;
    }
    protected $fillable = ['judul', 'sinopsis', 'foto', 'tahun', 'profil_id'];
}
