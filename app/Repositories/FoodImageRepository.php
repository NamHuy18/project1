<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Requests;
use App\foodImage;
use App\Food;
use App\Http\Requests\FoodImageRequest;

class FoodImageRepository
{
    public function all()
    {         
        return foodImage::paginate(config('pagination.foodImage'));
    }

    public function findOrFail($id)
    {
        return foodImage::findOrFail($id);
    }

    public function findFood($id)
    {
        return Food::findOrFail($id);
    }

    public function add(FoodImageRequest $request, $id)
    {   
        $food = Food::findOrFail($id);
        $foodImage = new foodImage;
        $validated = $request->validated();
        $foodImage->name = $request->name;
        $foodImage->food_id = $food->id;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists("upload/foodImage/" . $image)) 
            {
                $image = str_random(4) . "_" . $name;
            }
            $file->move(config('setting.avatar.foodImage'), $image);
            $foodImage->image = $image;
        }
        else
        {
            $foodImage->image = '';
        }
        $foodImage->save();
    }
}

