<?php

namespace App\Repositories;

use App\Food;
use App\Promotion;
use App\Category;
use App\Http\Requests\FoodRequest;
use Illuminate\Support\Facades\Input;

class FoodRepository
{   
    public function __construct(Food $food)
    {
        $this->model = $food;
    }

    /**
     * @param array $data
     * @return Food
     * @throws CreateFoodErrorException
     */
    public function createFood(array $data) : Food
    {
        try 
        {
            return $this->model->create($data);
        } 
        catch (QueryException $e) 
        {
            throw new CreateFoodErrorException($e);
        }
    }

    /**
     * @param array $data
     * @return bool
     * @throws UpdateFoodErrorException
     */
    public function updateFood(array $data) : bool
    {
        try 
        {
            return $this->model->update($data);
        } 
        catch (QueryException $e) 
        {
            throw new UpdateFoodErrorException($e);
        }
    }
    public function all()
    {
        return Food::paginate(config('pagination.food'));
    }

    public function chooseSale()
    {
        return Promotion::all();
    }

    public function chooseCategory()
    {
        return Food::all();
    }

    public function findOrFail($id)
    {
        return Food::findOrFail($id);
    }

    public function add(FoodRequest $request)
    {
        $food = new Food;
        $validated = $request->validated();
        $food->name = $request->name;
        $food->slug = changeTitle($request->name);
        $food->description = $request->description;
        $food->content = $request->content;
        $food->price = $request->price;
        $food->new = $request->new;
        $food->top = $request->top;
        $food->promotion_id = $request->promotion;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . '_' . $name;
            while (file_exists("upload/food/" . $image)) 
            {
                $image = str_random(4) . '_' . $name;
            }
            $file->move(config('setting.avatar.food'), $image);
            $food->image = $image;
        }
        else
        {
            $food->image = '';
        }
        $food->save(); 
        $data1 = Input::get('categories');
        $food = Food::orderBy('id', 'desc')->first();
        $food->categories()->attach($data1);
    }

    public function update(FoodRequest $request, $id)
    {
        $food = Food::findOrFail($id);
        $validated = $request->validated();
        $food->name = $request->name;
        $food->slug = changeTitle($request->name);
        $food->description = $request->description;
        $food->content = $request->content;
        $food->price = $request->price;
        $food->new = $request->new;
        $food->top = $request->top;
        $food->promotion_id = $request->promotion;
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . '_' . $name;
            while (file_exists("upload/food/" . $image)) 
            {
                $image = str_random(4) . '_' . $name;
            }
            unlink('upload/food/'.$food->image);
            $file->move(config('setting.avatar.food'), $image);
            $food->image = $image;
        }
        $food->save();
        $data1 = Input::get('categories');
        $food = Food::findOrFail($id);
        $food->categories()->sync($data1);
    }
}

