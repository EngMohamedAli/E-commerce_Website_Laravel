<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Session;

class MyCart extends Model
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
    	if($oldCart)
    	{
    		$this->items = $oldCart->items;
    		$this->totalQuantity = $oldCart->totalQuantity;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function addNewItem($item , $id)
    {
    	$newItem = ['quantity' => 0 , 'price' => $item->price , 'item' => $item];
    	if($this->items)
    	{
    		if(array_key_exists($id, $this->items))
    		{
    			$newItem = $this->items[$id];
    		}
    	}
    	$newItem['quantity']++;
    	$newItem['price'] = $item->price * $newItem['quantity'];
    	$this->items[$id] = $newItem;
    	$this->totalQuantity++;
    	$this->totalPrice += $item->price; 
    }

    public function increaseByOne($id)
    {
        $this->items[$id]['quantity']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQuantity++;
        $this->totalPrice += $this->items[$id]['item']['price'];
        if ($this->items[$id]['quantity'] <= 0)
        {
            unset($this->items[$id]);
        }
    }

    public function decreaseByOne($id)
    {
        $this->items[$id]['quantity']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQuantity--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['quantity'] <= 0)
        {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        $this->totalQuantity -= $this->items[$id]['quantity'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

    public function emptyCart()
    {
        $this->totalQuantity = 0;
        $this->totalPrice = 0;
        unset($this->items);
    }
}
