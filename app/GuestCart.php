<?php

namespace App;

class GuestCart
{
    public $items = null;
    public $qty = 0;
    public $price = 0;

    public function __construct($sessionData)
    {
        if ($sessionData) {
            $this->items = $sessionData->items;
            $this->qty = $sessionData->qty;
            $this->price = $sessionData->price;
        }
    }

    public function addGuestItemCart($item, $id)
    {
        $item = [
            'quantity' => 0,
            'price' =>$item->price,
            'item' => $item
        ];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $item = $this->items[$id];
            }
        }

        $item['quantity']++;
        $item['price'] = $item->price * $item['quantity'];
        $this->items[$id] = $item;
        $this->qty++;
        $this->price += $item->price;
    }
}