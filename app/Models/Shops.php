<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @mixin Eloquent
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Shops extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
