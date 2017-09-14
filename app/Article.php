<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //
    protected $fillable = ['author', 'title', 'content'];
    protected $dates = ['published_at'];//非Carbon对象的published_at被当做Carbon对象处理

    public function setCreatedAtAttribute($date){
        $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    //Article::
    public function scopeCreated($query) {
        $query->where('created_at', '<=', Carbon::now());
    }
}
