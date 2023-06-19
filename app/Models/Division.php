<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table        = 'divisions';
    protected $primaryKey   = 'division_id';
    protected $fillable     = ['division_name'];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
