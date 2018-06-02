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
        'item_category_id',
        'description',
        'price',
        'quantity',
        'slug'
    ];

    public function item_category()
    {
        return $this->belongsTo('App\ItemCategory');
    }

    public static function guestGetItem($slug)
    {
        $query = DB::table('products')
                ->select(
                    'name',
                    'price'
                )
                ->where('slug', $slug);
        $result = $query->get();
        return $result;
    }
}
