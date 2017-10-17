<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'review';
    protected $fillable = ['amazon_id', 'user_id', 'nama_user', 'rating'];

    public function user()
    {
      return $this->belongsTo('App\User','user_id');
    }
      public function metadata()
      {
          return $this->belongsTo('App\Metadata', 'amazon_id');
      }
      
}
