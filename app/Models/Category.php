<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    /**
     * Get the Items that belongs this Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * Get the Groups that belongs this Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * Get all of the Items for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function Group_Items()
    {
        return $this->hasManyThrough(Item::class, Group::class);
    }

}
