<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Menu extends Model
{
	use PresentableTrait;
	protected $presente = "App\\Presenters\\MenuPresenter";
    protected $table = "menus";
    protected $fillable = [
    	'title',
    	'slug',
    	'href',
    	'parent_id',
    	'position',
    	'status'
    ];
    public $timestamps = true;

    // public static function createTree($menu_items,$parent_id = 0)
    // {
    // 	$tree = array();
    // 	foreach ($menu_items as $key => $menu_item)
    // 	{
    // 		if($menu_item->parent_id == $parent_id)
    // 		{
    // 			if(self::where('parent_id',$parent_id) ->count() == 0){}
    // 		}
    // 	}
    // 	return $tree;
    // }
    // public static function createList($tree,$menu_items)
    // {
    // 	$list = '';
    // 	foreach ($tree as $key => $tr) {
    // 		if(count($tr))
    // 		{
    // 			$list.=$menu_items[$key]->present()->
    // 		}
    // 	}
    // }
    // public static function createMenu()
    // {
    // 	$menu_items = self::where('status',1)->get();
    // 	$tree = self::createTree($menu_items);
    // 	return $tree;
    // }
}
