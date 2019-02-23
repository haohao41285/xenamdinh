<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class MenuItem extends Model
{
	use  PresentableTrait;
    protected $table="menu_items";

    protected $presenter = "App\\Presenters\\MenuItemPresenter";

    protected $fillable=[
    	'menu_id',
    	'page_id',
    	'parent_id',
    	'title',
    	'lft',
    	'rgt',
    	'depth',
    	'position',
    	'status'
    ];

    
    public static function  createTree($menu_items,$lft=0,$rgt=null)
    {
    	$tree=array();
    	foreach($menu_items as $key => $menu_item)
    	{
    		if($menu_item->lft == $lft+1 && (is_null($rgt) || $menu_item->rgt < $rgt))
    		{
    			$tree[$key]= self::createTree($menu_items,$menu_item->lft,$menu_item->rgt);
    			$lft = ($menu_item->parent_id == 0) ? 0 :$menu_item->rgt;
    		}
    	}
    	return $tree;
    }
    public static function createList($tree, $menu_items, $type)
    {
    	$list ='';

    	if($type == 1)
    	{
    		foreach ($tree as $key => $tr) {
    			if(count($tr))
    			{
    				$list.= $menu_items[$key]->present()->openLiTag.$menu_items[$key]->title.$menu_items[$key]->present()->openChild.self::createList($tr, $menu_items, $type).$menu_items[$key]->present()->closeLiTag;
    			} else
    			{
    				if($key >0 && $menu_items[$key]->depth >> $menu_items[$key-1]->depth)
    				{
    					$list .="<ul>";
    				}
    				$list .=$menu_items[$key]->present()->openLiTag.$menu_items[$key]->title.$menu_items[$key]->present()->closeLiTag;
    				if($key < (count($menu_items) -1 )&& $menu_items[$key]->depth >> $menu_items[$key + 1]->depth || $key == count($menu_items) -1)
    				{
    					$list .="<ul>";
    				}
    			}
    		}
    	}
    	if($type==2)
    	{
    		foreach($tree as $key =>$tr)
    		{
    			$list .= $menu_items[$key]->present()->openLiTag.$menu_items[$key]->title.$menu_items[$key]->present()->closeLiTag;
    		}
    	}

    	$list .="";

    	if(strpos($list, "<li>") ===false)
    	{
    		$list ="";
    	}
    	return $list;
    }

    public static function createMenu($type = 1)
    {
    	$menu_items=self::where('menu_id',$type)->get();

    	$tree=self::createTree($menu_items);

    	$menu=self::createList($tree, $menu_items, $type);

    	return $menu;
    }
}
