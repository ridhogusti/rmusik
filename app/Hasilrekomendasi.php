<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasilrekomendasi extends Model
{
    //
    protected $table = 'hasilrekomdasi';
    protected $fillable = ['amazon_id', 'reviewerid', 'rekomend', 'rating', 'hasil'];

    public function user()
    {
      return $this->belongsTo('App\User','user_id');
    }
    public function metadata()
    {
        return $this->belongsTo('App\Metadata', 'amazon_id');
    }
    
    public function Review()
    {
        return $this->belongsTo('App\Review', 'amazon_id');
    }
    
}
