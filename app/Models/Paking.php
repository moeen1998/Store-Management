<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paking extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'name',
        'value',
    ];

    /**
     * Get the item that owns the pakings
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
}
