<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Meeting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'description',
        'url',
    ];

    public function toSearchableArray()
    {
        return [
            'title'       => $this->title,
            'start_date'  => $this->start_date,
            'end_date'    => $this->end_date,
            'description' => $this->description,
            'url'         => $this->url
        ];
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function files()
    {
        return $this->hasMany(Files::class);
    }
}
