<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;  // for soft deletion post

    protected $fillable = ['title','image_url', 'content'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Associate a post with user who created or last modified it
    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();
            $model->created_by = $user->id;
        });
        static::updating(function($model)
        {
            $user = Auth::user();
            $model->last_modified_by = $user->id;
        });
        static::deleting(function ($model)
        {
            $user = Auth::user();
            $model->deleted_by = $user->id;
            $model->save();
        });
    }

}
