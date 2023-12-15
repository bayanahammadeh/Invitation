<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $table = "invitations";

    public function nk()
    {
        return $this->belongsTo('App\Models\NickeName', 'nick_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function chair()
    {
        return $this->belongsTo('App\Models\Chair', 'chair_id');
    }
}
