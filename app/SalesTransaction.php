<?php

namespace App;
use \DB;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class SalesTransaction extends Model
{
	public static function trackTotalSales()
	{
		$query = DB::table('sales_transactions')
		->where('order_status_id', '>', 1)
		->sum('total_amount');
		return $query;
	}

	public static function trackTotalTransactions()
	{
		$query = DB::table('sales_transactions')
		->count('id');
		return $query;
	}

	public static function trackTotalProducts()
	{
		$query = DB::table('products')
		->count('id');
		return $query;
	}

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function setFilteredReportByDate($date = null)
    {
    	$query = DB::table('sales_transactions')
    		->select(
    			'transaction_date',
    			'order_code',
    			'customer_email',
    			'sold_quantity',
    			'total_amount',
    			'order_status_id'
    		);
    	if (!is_null($date)) {
    		$query2 = $query->where('transaction_date', $date);
    	}
    	$result = $query->get();
    	// dd($result);
    	return $result;
    }
}
