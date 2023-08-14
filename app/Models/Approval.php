<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $table        = 'approvals';
    protected $primaryKey   = 'approval_id';
    protected $fillable     = ['document_id', 'approved_by', 'status_ap','approval_date', 'revisi_note','signature'];

    public function document()
    {
        return $this->belongsTo('App\Models\Document', 'document_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'approved_by');
    }
}
