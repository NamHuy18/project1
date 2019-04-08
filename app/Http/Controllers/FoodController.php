<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Promotion;
use App\Category;
use App\Requests;
use App\Http\Requests\FoodRequest;
use App\Repositories\FoodRepository;

class FoodController extends Controller
{   
    protected $food, $promotion, $category;

    public function __construct(FoodRepository $food, FoodRepository $promotion, FoodRepository $category)
    {
        $this->food = $food;
        $this->promotion = $promotion;
        $this->category = $category;
    }

    public function getList()
    {
        $food = $this->food->all();
    
    	return view('admin.food.list', compact('food'));
    }

    public function getAdd()
    {   
        $promotion = $this->promotion->chooseSale();
        $category = $this->category->chooseCategory();

    	return view('admin.food.add', compact('promotion', 'category'));
    }

    public function postAdd(FoodRequest $request)
    {
        $food = $this->food->add($request);

        return redirect(route('addFood'))->with('message', trans('setting.add_success'));
    }

    public function getEdit($id)
    {
        try 
        {
            $food = $this->food->findOrFail($id);
            $promotion = $this->promotion->chooseSale();
            $category = $this->category->chooseCategory();

            return view('admin.food.edit', compact('food', 'promotion', 'category'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function postEdit(foodRequest $request, $id)
    {   
        try
        {
            $food = $this->food->update($request, $id);

            return redirect('admin/food/edit/' . $id)->with('message', trans('setting.edit_success'));
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
            $food = Food::findOrFail($id);
            unlink('upload/food/'.$food->image);
            $food->delete();
            return redirect(route('listFood'))->with('message', trans('setting.delete_success'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}
