<?php

namespace App\Http\Controllers;
use App\Food;
use App\Order;
use App\News;
use App\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getHome()
    {   
        $totalFood = Food::all()->count();
        $totalOrder = Order::all()->count();
        $totalOrderDone = Order::where('status', 1)->count();
        $orderDone = Order::where('status', 1)->get();
        $totalNews = News::all()->count();
        $totalUser = User::where('level', 1)->count();

        
        return view('admin.home', compact('totalFood', 'totalOrder', 'totalOrderDone', 'totalNews', 'totalUser', 'orderDone'));
    }
}
