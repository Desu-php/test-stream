<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    use HasFactory;

    const BROADCASTING = 'broadcasting';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'preview',
        'stream_id'
    ];

    public function getPreviewUrlAttribute() :string
    {
        return asset($this->preview);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
