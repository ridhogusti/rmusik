<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasilrekomdasi';
    protected $fillable = ['amazon_id', 'reviewerid', 'rekomend', 'rating', 'hasil'];

    public function Review()
    {
        return $this->belongsTo('App\Review', 'amazon_id');
    }
}
