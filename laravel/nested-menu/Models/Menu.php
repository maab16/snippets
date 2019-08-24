<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //

    protected $fillable = [
        'title', 'slug', 'order', 'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    // recursive, loads all descendants
    public function childrens()
    {
        return $this->children()->with('childrens');
    }
}
