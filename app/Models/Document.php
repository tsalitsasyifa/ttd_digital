<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table        = 'documents';
    protected $primaryKey   = 'document_id';
    protected $fillable     = ['title', 'description', 'file_path', 'status', 'uploaded_by'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function approval()
    {
        return $this->hasMany('App\Models\Approval');
    }

    public function user_approval()
    {
        return $this->hasMany('App\Models\UserApproval');
    }
}
