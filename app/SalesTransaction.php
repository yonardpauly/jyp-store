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
		->where('is_approved', 1)
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
}
