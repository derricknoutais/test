<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'body'];

    public function project(){
        return $this->belongsToMany(Project::class);
    }
}
