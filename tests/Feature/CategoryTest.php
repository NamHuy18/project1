<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Category;
use App\Repositories\CategoryRepository;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function showCategory()
    {
        $category = factory(App\Category::class)->create();
        $categoryRepo = new CategoryRepository(new Category);
        $found = $categoryRepo->findOrFail($category->id);
        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals($found->name, $category->name);
        $this->assertEquals($found->slug, $category->slug);
    }

    /** @test */
    public function createCategory()
    {
        $fakeCategory = factory(App\Category::class)->create(); 
        $data = [
            'name' => $fakeCategory->name,
            'slug' => $fakeCategory->slug,
        ];
        $categoryRepo = new CategoryRepository(new Category);
        $category = $categoryRepo->createCategory($data);    
        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals($data['name'], $category->name);
        $this->assertEquals($data['slug'], $category->slug);
        $this->assertDatabaseHas('categories', [
            'name' => $category->name,
            'slug' => $category->slug,
        ]);
    }

    /** @test */
    public function updateCategory()
    {
        $category = factory(App\Category::class)->create(); 
        $data = [
            'name' => 'abc',
            'slug' => 'a-b-c',
        ];
        $categoryRepo = new CategoryRepository($category);
        $update = $categoryRepo->updateCategory($data);
        $this->assertTrue($update);
        $this->assertEquals($data['name'], $category->name);
        $this->assertEquals($data['slug'], $category->slug);
    }

    /** @test */
    public function deleteCategory()
    {
        $category = factory(App\Category::class)->create();
        $categoryRepo = new CategoryRepository(new Category);
        $delete = $categoryRepo->delete($category->id);
        $this->assertTrue($delete);
    }
}
