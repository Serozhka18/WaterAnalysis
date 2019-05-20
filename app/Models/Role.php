<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 */
class Role extends Model
{
    /**
     * @return Role
     */
    public static function defaultRole(): Role
    {
        return self::where('role', 'user')->first();
    }
}
