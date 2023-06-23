<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $table        = 'approvals';
    protected $primaryKey   = 'approval_id';
    protected $fillable     = ['document_id', 'approved_by', 'approval_date'];

    public function document()
    {
        return $this->belongsTo('App\Models\Document', 'document_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
