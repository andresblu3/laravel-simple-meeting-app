<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'meeting_id',
    ];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
