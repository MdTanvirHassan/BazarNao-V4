<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
      'user_id','credit_enable','credit_balance','nid'
    ];
    public function user(){
    	return $this->belongsTo(user::class);
    }

    public function orders()
    {
    return $this->hasMany(Order::class,'user_id','user_id')->Join('order_details','orders.id','=','order_details.order_id')->whereIn('order_details.delivery_status',array('confirmed','on_delivery','delivered','received'))->groupBy('order_details.order_id')->get();
    }
}
