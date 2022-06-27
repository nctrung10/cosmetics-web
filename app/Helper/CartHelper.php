<?php 

namespace App\Helper;


class CartHelper
{

    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }

    public function add($product, $quantity = 1, $discount_price)
    {
        $item = [
            'id' => $product->id,
            'ten' => $product->ten,
            'gia' => $discount_price,
            'hinhanh' => $product->hinhanh,
            'quantity' => $quantity,
        ];
        
        //tăng số lượng sản phẩm trong giỏ
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;    //nếu có sp với id tương ứng thì chỉ tăng sl
        }else {
            $this->items[$product->id] = $item;     //mảng 2 chiều lưu nhiều sản phẩm
        }
        
        //lưu session cart với items vừa gán
        session(['cart' => $this->items]);   
    }

    public function remove($id)
    {
        if(isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        //unset rồi update lại giỏ hàng
        session(['cart' => $this->items]);
    }

    public function update($id, $quantity = 1)
    {
        if(isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;   
        }

        session(['cart' => $this->items]); 
    }

    public function clear()
    {
        session(['cart' => '']);   
    }

    private function get_total_price()
    {
        $t = 0;

        foreach($this->items as $item)
        {
            $t += $item['gia'] * $item['quantity'];
        }
        
        return $t;
    }

    private function get_total_quantity()
    {
        $t = 0;

        foreach($this->items as $item)
        {
            $t += $item['quantity'];
        }

        return $t;
    }
    
    public function randString($length)
    {
        $charts = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1230456789";
        $str = '';
        $size = strlen($charts);
        for ($i=0; $i < $length; $i++) {
            $str .= $charts[rand(0, $size - 1)];
        }
        return $str;
    }



}
