<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Result
 * @package App\Models
 */
class Result extends Model
{
    protected $fillable = [
        'result',
        'region_id',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * @return HasOne
     */
    public function region(): HasOne
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
