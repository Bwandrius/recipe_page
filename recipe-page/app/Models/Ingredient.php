<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(
            Recipe::class,
            'recipe_ingredients',
            'ingredient_id',
            'recipe_id'
        );
    }

    public function recipeIngredients(): HasMany
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    public function getRecipeCountAttribute(): int
    {
        return $this->RecipeIngredients()->count();
    }
}
