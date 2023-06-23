<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApproval extends Model
{
    use HasFactory;

    protected $table        = 'user_approvals';
    protected $primaryKey   = 'user_approval_id';
    protected $fillable     = ['user_id', 'document_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function document()
    {
        return $this->belongsTo('App\Models\Document', 'document_id');
    }
}
