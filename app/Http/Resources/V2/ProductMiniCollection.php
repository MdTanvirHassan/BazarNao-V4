<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductMiniCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {

                $numprice = MainhomeDiscountedBasePrice($data->id);
                $price = (double) preg_replace("/[^0-9.]/", "", $numprice);

                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'thumbnail_image' => api_asset($data->thumbnail_img),
                    'has_discount' => homeBasePrice($data->id) != $price ,
                    'outofstock' => $data->outofstock,
                    'base_price' => format_price(homeBasePrice($data->id)-$data->discount) ,
                    'app_price' => $data->app_unit_price ,
                    'web_price' => $data->web_unit_price ,
                    'rating' => (double) $data->rating,
                    'sales' => (integer) $data->num_of_sale,
                    'discount' => !empty($data->discount) ? $data->discount : 0.00,
                    'price' => homeBasePrice($data->id),
                    'discount_price' => MainhomeDiscountedBasePrice($data->id),
                    'max_qty' => $data->max_qty,
                    'links' => [
                        'details' => route('products.show', $data->id),
                    ]
                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}