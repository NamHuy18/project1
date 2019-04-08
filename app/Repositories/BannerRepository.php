<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Requests;
use App\Banner;
use App\Http\Requests\BannerRequest;

class BannerRepository
{
    public function all()
    {
        return Banner::paginate(config('pagination.banner'));
    }

    public function findOrFail($id)
    {
        return Banner::findOrFail($id);
    }

    public function add(BannerRequest $request)
    {
        $banner = new Banner;
        $validated = $request->validated();
        $banner->name = $request->name;
        $banner->status = $request->status;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists("upload/banner/" . $image)) 
            {
                $image = str_random(4) . "_" . $name;
            }
            $file->move(config('setting.avatar.banner'), $image);
            $banner->image = $image;
        }
        else
        {
            $banner->image = '';
        }
        $banner->save();
    }
    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $validated = $request->validated();
        $banner->name = $request->name;
        $banner->status = $request->status;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists("upload/banner/" . $image)) 
            {
                $image = str_random(4) . "_" . $name;
            }
            unlink('upload/user/'.$banner->image);
            $file->move(config('setting.avatar.banner'), $image);
            $banner->image = $image;
        }
        $banner->save();
    }
}

