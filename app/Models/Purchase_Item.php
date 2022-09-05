<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'item_id',
        'qty',
        'p_type',
        'p_value',
    ];

    /**
     * Get the Purchase that owns the Items
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    /**
     * Get the user associated with the Purchase_Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
