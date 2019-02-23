<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table="pages";

    protected $fillable= [
    	'parent_id',
    	'code',
    	'group_code',
    	'theme',
    	'active',
    	'position',
    ];

    const THEME_PATH_VIEW = 'themes';
    
    public function scopeActive($query)
    {
    	return $query->where('active',1);
    }
}
