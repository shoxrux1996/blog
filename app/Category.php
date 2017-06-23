<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function children(){
    	return $this->hasMany('yuridik\Category');
    }
    public function parent(){
    	return $this->belongsTo('yuridik\Category');
    }

     public static function htmlFromArray($array) {      
       foreach ($array as $key) {
       	Print '<ul>';
	        Print "<li>".$key->name. '__'.$key->id.'__'.$key->category_id."</li>";
	            if($key->children != null) {
	                $categories = Category::where('category_id', $key->id)->get();
	                $this->htmlFromArray($categories);
	            }
        Print '</ul>';
        } 
        
    }
}
