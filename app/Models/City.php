<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\City
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class City extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function shops(): HasMany
    {
        return $this->hasMany(Shops::class);
    }


}
