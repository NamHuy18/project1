<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Requests;
use App\Http\Requests\StoreRequest;
use App\Repositories\StoreRepository;

class StoreController extends Controller
{   
    protected $store;

    public function __construct(StoreRepository $store)
    {
        $this->store = $store;
    }

    public function getList()
    {
        $store = $this->store->all();

    	return view('admin.store.list', compact('store'));
    }

    public function getAdd()
    {
    	return view('admin.store.add');
    }

    public function postAdd(StoreRequest $request)
    {   
        $store = $this->store->add($request);

        return redirect(route('addStore'))->with('message', trans('setting.add_success'));
    }

    public function getEdit($id)
    {
        try 
        {
            $store = $this->store->findOrFail($id);

            return view('admin.store.edit', compact('store'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function postEdit(StoreRequest $request, $id)
    {   
        try
        {
            $store = $this->store->update($request, $id);

            return redirect('admin/store/edit/' . $id)->with('message', trans('setting.edit_success'));
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
            $store = $this->store->delete($id);

            return redirect(route('listStore'))->with('message', trans('setting.delete_success'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}
