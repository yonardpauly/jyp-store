<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DB;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'item_categories_id',
        'description',
        'price',
        'quantity',
        'slug'
    ];

    public function item_category()
    {
        return $this->belongsTo('App\ItemCategory', 'item_categories_id', 'id');
    }

    public static function guestGetItem($slug)
    {
        $query = DB::table('products')
                ->select(
                    'name',
                    'price',
                    'slug'
                )
                ->where('slug', $slug);
        $result = $query->get();
        return $result;
    }

    public static function getStocks($slug)
    {
        $query = DB::table('products')
            ->select('quantity')
            ->where('slug', $slug);
        $result = $query->get();
        return $result;
    }
}
