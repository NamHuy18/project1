<?php

namespace App\Repositories;

use App\Category;
use App\Store;
use App\Food;
use App\Banner;
use App\User;
use App\Http\Requests\RegisterRequest;

class PageRepository
{   
    public function findOrFail($id)
    {
        return Food::findOrFail($id);
    }

    public function banner1()
    {
        return Banner::where('status', '1')->get();
    }

    public function banner2()
    {
        return Banner::where('status', '2')->get();
    }

    public function banner3()
    {
        return Banner::where('status', '3')->get();
    }

    public function banner4()
    {
        return Banner::where('status', '4')->get();
    }

    public function saleFood()
    {
        return Food::whereNotNull('promotion_id')->take(config('setting.take'))->get();
    }

    public function newFood()
    {
        return Food::where('new', 1)-> take(config('setting.take'))->get();
    }

    public function topFood()
    {
        return Food::where('top', 1)-> take(config('setting.take'))->get();
    }

    public function addUser(RegisterRequest $request)
    {
        $user = new User;
        $validated = $request->validated();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->level = 1;
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . '_' . $name;
            while (file_exists(config('setting.avatar.user') . $avatar)) 
            {
                $avatar = str_random(4) . '_' . $name;
            }
            if(file_exists(config('setting.avatar.user') . $avatar))
            {
                unlink(config('setting.avatar.user') . $user->avatar);
            }
            $file->move(config('setting.avatar.user'), $avatar);
            $user->avatar = $avatar;
        } else {        
            $user->avatar = '';
        }
        $user->save();
    }
}

