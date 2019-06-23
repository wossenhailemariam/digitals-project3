<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'company_id',
        'user_id',
        'days',

    ];


    public function users(){
		return $this->belongsToMany('App\User');
    }

    public function company(){
		return $this->belongsTo('App\Company');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    //CLEAN UP: DEFINE SCOPE HERE
    public function scopeFilterUser($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}
