<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhcModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','users','posts','tags','ads','slider',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
