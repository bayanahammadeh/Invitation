<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NickeName extends Model
{
    use HasFactory;

    protected $table = "nicke_names";

    public function invitations()
    {
        return $this->hasMany('App\Models\invitation', 'id');
    }
}
