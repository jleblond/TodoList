<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model 
{
    protected $fillable = ['name', 'description', 'user_id', 'done'];


     /**
     * Get the user that created the task
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
