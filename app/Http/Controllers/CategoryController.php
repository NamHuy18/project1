<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Requests;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{   
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function getList()
    {
        $category = $this->category->all();

    	return view('admin.category.list', compact('category'));
    }

    public function getAdd()
    {
    	return view('admin.category.add');
    }

    public function postAdd(CategoryRequest $request)
    {
        $category = $this->category->add($request);

        return redirect(route('addCat'))->with('message', trans('setting.add_success'));
    }

    public function getEdit($id)
    {
        try 
        {
            $category = $this->category->findOrFail($id);

            return view('admin.category.edit', compact('category'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function postEdit(CategoryRequest $request, $id)
    {   
        try
        {
            $category = $this->category->update($request, $id);

            return redirect('admin/category/edit/' . $id)->with('message', trans('setting.edit_success'));
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
            $category = $this->category->delete($id);

            return redirect(route('listCat'))->with('message', trans('setting.delete_success'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}
