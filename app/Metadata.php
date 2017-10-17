<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    //
    protected $table = 'metadata';
    protected $fillable = ['amazon_id', 'title', 'artist', 'root_genre', 'label', 'first_release_year', 'imUrl'];

    public function user()
    {
      return $this->belongsTo('App\User','user_id');
    }

    
    public function review()
    {
        return $this->belongsTo('App\Review', 'amazon_id');
    }
    
}
