<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\orderDetail;

class OrderController extends Controller
{
    public function getList()
    {
        $order = Order::paginate(5);

        return view('admin.order', compact('order'));
    }

    public function getListDetail($id)
    {
        try
        {
            $order = Order::findOrFail($id);
            $orderDetail = orderDetail::all();

            return view('admin.orderDetail', compact('order', 'orderDetail'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }    
    }

    public function getEdit($id)
    {
        try 
        {
            $order = Order::findOrFail($id);

            return view('admin.updateOrder', compact('order'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        } 
    }

    public function postEdit(Request $request, $id)
    {
        try 
        {
            $order = Order::findOrFail($id);
            $order->update([
                'status' => $request->get('status'),
            ]);

            return redirect('admin/order/edit/' . $id)->with('message', trans('setting.edit_success'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        } 
    }

    public function getDelete($id)
    {
        try
        {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect(route('listOrder'))->with('message', trans('setting.delete_success'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }    
    }
}
