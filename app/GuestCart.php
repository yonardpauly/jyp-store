<?php

namespace App;

class GuestCart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($sessionData)
    {
        if ($sessionData) {
            $this->items = $sessionData->items;
            $this->totalQty = $sessionData->totalQty;
            $this->totalPrice = $sessionData->totalPrice;
        }
    }

    public function addGuestItemCart($item, $slug)
    {
        $storedItem = [
            'item' => $item,
            'price' => $item[0]->price,
            'qty' => 0
        ];

        if ($this->items) {
            if (array_key_exists($slug, $this->items)) {
                $storedItem = $this->items[$slug];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $item[0]->price * $storedItem['qty'];
        $this->items[$slug] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item[0]->price;
    }
}
