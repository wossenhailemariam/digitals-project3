<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    //

    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id'

    ];

    public function user(){
		return $this->belongsTo('App\User');
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    //TO DO: add scopes here
    public function scopeFilterUser($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

}
