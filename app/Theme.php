<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Theme extends Model
{


    protected $fillable = ['name','cdn_url', 'description', 'is_default'];

    // Associate a theme with user who created or last modified it
    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();
            $model->created_by = $user->id;
            //$model->last_modified_by = $user->id;
        });
        static::updating(function($model)
        {
            $user = Auth::user();
            $model->last_modified_by = $user->id;
        });
    }



}
