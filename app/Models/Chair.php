<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    use HasFactory;

    protected $table = "chairs";

    public function invitations(){
        return $this->hasMany('App\Models\invitation','id');
    }
}
