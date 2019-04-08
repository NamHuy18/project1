<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Requests;
use App\Http\Requests\BannerRequest;
use App\Repositories\BannerRepository;

class BannerController extends Controller
{   
    protected $banner;

    public function __construct(BannerRepository $banner)
    {
        $this->banner = $banner;
    }

    public function getList()
    {
        $banner = $this->banner->all();

    	return view('admin.banner.list', compact('banner'));
    }

    public function getAdd()
    {
    	return view('admin.banner.add');
    }

    public function postAdd(BannerRequest $request)
    {   
        $banner = $this->banner->add($request);

        return redirect(route('addBanner'))->with('message', trans('setting.add_success'));
    }

    public function getEdit($id)
    {
        try 
        {
            $banner = $this->banner->findOrFail($id);

            return view('admin.banner.edit', compact('banner'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function postEdit(BannerRequest $request, $id)
    {   
        try
        {
            $banner = $this->banner->update($request, $id);

            return redirect('admin/banner/edit/' . $id)->with('message', trans('setting.edit_success'));
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
            $banner = Banner::findOrFail($id);
            unlink('upload/banner/'.$banner->image);
            $banner->delete();
            
            return redirect(route('listBanner'))->with('message', trans('setting.delete_success'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}

