<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperProperty
 */
class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'adress',
        'postal_code',
        'sold',
        // 'options'=>['array','exists:options,id']
    ];

    public function Options(): BelongsToMany
    {
        return $this->belongsToMany(Option :: class);
    }

    // public function getSlug(){
    //     return Str::slug($this->title);
    // }

    public function getFormattedPriceAttribute(): string
    {
        return str_replace('.', ',', $this->price/100).'€';
    }
}
