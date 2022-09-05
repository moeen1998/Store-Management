<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'item_id',
        'qty',
        'p_type',
        'p_value',
    ];

    /**
     * Get the order that owns the Items
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }



}
