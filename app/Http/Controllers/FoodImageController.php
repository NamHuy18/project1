<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foodImage;
use App\Requests;
use App\Http\Requests\FoodImageRequest;
use App\Repositories\FoodImageRepository;

class FoodImageController extends Controller
{   
    protected $foodImage, $food;

    public function __construct(FoodImageRepository $foodImage, FoodImageRepository $food)
    {
        $this->foodImage = $foodImage;
        $this->food = $food;
    }

    public function getList($id)
    {   
        $food = $this->food->findFood($id);
        $foodImage = $this->foodImage->all();

    	return view('admin.food_image.list', compact('foodImage', 'food'));
    }

    public function getAdd($id)
    {   
        $food = $this->food->findFood($id);
    	return view('admin.food_image.add', compact('food'));
    }

    public function postAdd(FoodImageRequest $request, $id)
    {   
        $foodImage = $this->foodImage->add($request, $id);

        return redirect('admin/food/image/add/' . $id)->with('message', trans('setting.add_success'));
    }

    public function getDelete($id)
    {
        try 
        {
            $foodImage = foodImage::findOrFail($id);
            unlink('upload/foodImage/'.$foodImage->image);
            $foodImage->delete();

            return redirect('admin/food/image/list/' . $id)->with('message', trans('setting.delete_success'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}
