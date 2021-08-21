<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class LinkShortener
 * @package App\Models
 * @property Carbon $expired_at
 */
class LinkShortener extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'link',
        'user_id',
        'expired_at'
    ];

    protected $casts = [
        'expired_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
