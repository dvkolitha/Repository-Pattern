<?php  

namespace App\Traits\ProductCategory\ProductCategoryAttribute;

use App\ProductCategory\Voltage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait AttributTrait {
	/**
	 * Traits constructor.
	 * @param Model $model
	 */

	public function deleteAttribute($id) 
	{
		$object = $this->model->withTrashed()->where('id',$id)->first();
	    $object->deletedBy = Auth::id();
	    $object->save();
	    
	   return $object->delete();;
	}
	public function restoreAttribute($id)
	{
	    $object = $this->model->withTrashed()->where('id',$id)->first();
	    $object->deletedBy = 0;
	    $object->save();
	    
	   return $object->restore();; 	
	}
    
}