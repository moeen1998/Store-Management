<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'name',
        'category_id',
        'group_id',
        'description',
        'price',
        'qty',
    ];

    /**
     * Get the category that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the Group that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Get the Pakings that belongs this Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Pakings()
    {
        return $this->hasMany(Paking::class);
    }
    

}
