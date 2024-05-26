<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartDetail;
use Cookie;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('frontend.view_cart', compact('categories'));
    }

    public function showCartModal(Request $request)
    {
        $product = Product::find($request->id);
        return view('frontend.partials.addToCart', compact('product'));
    }

    public function updateNavCart(Request $request)
    {
        return view('frontend.partials.cart');
    }

    public function updateRightCart(Request $request)
    {
        return view('frontend.inc.rightsidebar');
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $data = array();
        $data['id'] = $product->id;
        $data['owner_id'] = $product->user_id;
        $str = '';
        $tax = 0;
        $status = 1;
        $msg = '';
        if ($product->digital != 1 && $request->quantity < $product->min_qty) 
        {
            return array('status' => 0, 'view' => view('frontend.partials.minQtyNotSatisfied', [
                'min_qty' => $product->min_qty
            ])->render());
        }

        //check the color enabled or disabled for the product
        if ($request->has('color')) 
        {
            $str = $request['color'];
        }

        if ($product->digital != 1) 
        {
            //Gets all the choice values of customer choice option and generate a string like Black-S-Cotton
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if ($str != null) {
                    $str .= '-' . str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                } else {
                    $str .= str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                }
            }
        }

        $data['variant'] = $str;
        $price = $product->unit_price;

        //discount calculation based on flash deal and regular discount
        //calculation of taxes
        $flash_deals = \App\Models\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        $todaytime = strtotime(date('H:i:s'));
        
        foreach ($flash_deals as $flash_deal) 
        {
            $flashstart = strtotime(date('H:i:s', $flash_deal->start_date));
            $flashend = strtotime(date('H:i:s', $flash_deal->end_date));
            if ($flashstart <= $todaytime && $flashend >= $todaytime) 
            {
                if ($flash_deal != null && $flash_deal->status == 1  && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\Models\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id','==', $product->id)->first() != null) 
                {
                    $flash_deal_product = \App\Models\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                    $price -= ($price * $flash_deal->discount_percent) / 100;
                    $inFlashDeal = true;
                    break;
                }
            }
        }

        if (!$inFlashDeal) 
        {
            if ($product->discount_type == 'percent') 
            {
                $price -= ($price * $product->discount) / 100;
            } 
            elseif ($product->discount_type == 'amount') 
            {
                $price -= $product->discount;
            }
        }

        if ($product->tax_type == 'percent') 
        {
            $tax = ($price * $product->tax) / 100;
        } 
        elseif ($product->tax_type == 'amount') 
        {
            $tax = $product->tax;
        }
    
        $data['quantity'] = $request['quantity'];
        $data['price'] = $price;
        $data['tax'] = $tax;
        $data['shipping'] = 0;
        $data['product_referral_code'] = null;
        

        if ($request['quantity'] == null) 
        {
            $data['quantity'] = 1;
        }

        if (Cookie::has('referred_product_id') && Cookie::get('referred_product_id') == $product->id) 
        {
            $data['product_referral_code'] = Cookie::get('product_referral_code');
        }
        $c_data = $data;
        if (Auth::check())
            $c_data['user_id']  = Auth::user()->id;
        else
            $c_data['user_id']  = 0;
        $c_data['status']  = 'Added';
        $c_data['ip']  = $request->ip;
        CartDetail::insert($c_data);
        if ($request->session()->has('cart')) 
        {
            $foundInCart = false;
            $cart = collect();

            foreach ($request->session()->get('cart') as $key => $cartItem) 
            {
                if ($cartItem['id'] == $request->id) 
                {
                    $foundInCart = true;
                    if(($product->max_qty) <= $cartItem['quantity']) 
                    {
						$msg = 'You Can not add more than '.($product->max_qty).' Quantity for this product';
						$status = 0;
					}
                    else
                    {
                        $cartItem['quantity'] += $request['quantity'];
                        $msg = translate('Item added to your cart!');
					}
                }
                $cart->push($cartItem);
            }

            if (!$foundInCart) 
            {
                $cart->push($data);
            }
            $request->session()->put('cart', $cart);
            } 
            else 
            {
                $cart = collect([$data]);
                $request->session()->put('cart', $cart);
            }
       
        return array('status' => $status,'msg'=>$msg, 'view' => view('frontend.partials.addedToCart', compact('product', 'data'))->render());
    }

    //removes from Cart
    public function removeFromCart(Request $request)
    {
        if ($request->session()->has('cart')) 
        {
            $cart = $request->session()->get('cart', collect([]));
            $cart->forget($request->key);
            $request->session()->put('cart', $cart);
        }

        return view('frontend.partials.cart_details');
    }

    //updated the quantity for a cart item
    public function updateQuantity(Request $request)
    {
        $cart = $request->session()->get('cart', collect([]));
		$msg = 0;
		$status = 0;
        $cart = $cart->map(function ($object, $key) use ($request,$msg) {
            if ($key == $request->key) {
                $product = \App\Models\Product::find($object['id']);
				if (($product->max_qty+1) <= $request->quantity) {
						$msg = 'You Can not add more than '.($product->max_qty).' Quantity for this product';
						$status = 1;
						echo $msg;exit;
                }
                if ($object['variant'] != null && $product->variant_product) {
                    $product_stock = $product->stocks->where('variant', $object['variant'])->first();
                    $quantity = $product_stock->qty;
                    if ($quantity >= $request->quantity) {
                        if ($product->outofstock == 0) {
                            $object['quantity'] = $request->quantity;
                        } else {
                            if ($object['variant'] != null && $product->variant_product) {
                                $product_stock = $product->stocks->where('variant', $object['variant'])->first();
                                $quantity = $product_stock->qty;
                                if ($quantity >= $request->quantity) {
                                    if ($request->quantity >= $product->min_qty) {
                                        $object['quantity'] = $request->quantity;
                                    }
                                }
                            } elseif ($product->current_stock >= $request->quantity) {
                                if ($request->quantity >= $product->min_qty) {
                                    $object['quantity'] = $request->quantity;
                                }
                            }
                        }
                    }
                } elseif ($product->outofstock == 0) {
                    $object['quantity'] = $request->quantity;
                } elseif ($product->current_stock >= $request->quantity) {
                    if ($request->quantity >= $product->min_qty) {
                        $object['quantity'] = $request->quantity;
                    }
                }
            }
            return $object;
        });
		
        $request->session()->put('cart', $cart);
		echo $msg;
       // return view('frontend.partials.cart_details');
    }
}
