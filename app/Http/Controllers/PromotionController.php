<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\Requests;
use App\Http\Requests\PromotionRequest;
use App\Repositories\PromotionRepository;

class PromotionController extends Controller
{   
    protected $promotion;

    public function __construct(PromotionRepository $promotion)
    {
        $this->promotion = $promotion;
    }

    public function getList()
    {
        $promotion = $this->promotion->all();

    	return view('admin.promotion.list', compact('promotion'));
    }

    public function getAdd()
    {
    	return view('admin.promotion.add');
    }

    public function postAdd(PromotionRequest $request)
    {
        $promotion = $this->promotion->add($request);

        return redirect(route('addSale'))->with('message', trans('setting.add_success'));
    }

    public function getEdit($id)
    {
        try 
        {
            $promotion = $this->promotion->findOrFail($id);

            return view('admin.promotion.edit', compact('promotion'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function postEdit(PromotionRequest $request, $id)
    {   
        try
        {
            $promotion = $this->promotion->update($request, $id);

            return redirect('admin/promotion/edit/' . $id)->with('message', trans('setting.edit_success'));
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
            $category = $this->promotion->delete($id);

            return redirect(route('listSale'))->with('message', trans('setting.delete_success'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}
