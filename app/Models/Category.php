<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id','name', 'description'];

    protected $appends = [
        'name_ar', 'description_ar', 'slug'
    ];

    protected $hidden =  [
        'name_ar', 'description_ar', 'slug'
    ];


    public function getNameArAttribute()
    {   
        $translation = Translation::where('model', 'Category')
            ->where('row_id', $this->attributes['id'])
            ->where('field', 'name')
            ->first();

        return $translation ? $translation->value : null;
    }

    public function getDescriptionArAttribute()
    {
        $translation = Translation::where('model', 'Category')
            ->where('row_id', $this->attributes['id'])
            ->where('field', 'description')
            ->first();

        return $translation ? $translation->value : null;
    }

    public function getSlugAttribute()
    {
        $slug = Slug::where('model', 'Category')
            ->where('row_id', $this->attributes['id'])
            ->first();

        return $slug ? $slug->value : null;
    }
}
