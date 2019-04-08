<?php

namespace App\Repositories;

use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryRepository
{   
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * @param array $data
     * @return Category
     * @throws CreateCategoryErrorException
     */
    public function createCategory(array $data) : Category
    {
        try 
        {
            return $this->model->create($data);
        } 
        catch (QueryException $e) 
        {
            throw new CreateCategoryErrorException($e);
        }
    }

    /**
     * @param array $data
     * @return bool
     * @throws UpdateCategoryErrorException
     */
    public function updateCategory(array $data) : bool
    {
        try 
        {
            return $this->model->update($data);
        } 
        catch (QueryException $e) 
        {
            throw new UpdateCategoryErrorException($e);
        }
    }

    public function all()
    {
        return Category::paginate(config('pagination.category'));
    }

    public function findOrFail($id)
    {
        return Category::findOrFail($id);
    }

    public function add(CategoryRequest $request)
    {
        $category = new Category;
        $validated = $request->validated();
        $category->create([
            'name' => $request->get('name'),
            'slug' => changeTitle($request->get('name')),
        ]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $validated = $request->validated();
        $category->update([
            'name' => $request->get('name'),
            'slug' => changeTitle($request->get('name')),
        ]);
    }

    public function delete($id)
    {
        $this->findOrFail($id)->delete();

        return true;
    }
}


