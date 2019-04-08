<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Food;
use App\Repositories\FoodRepository;

class FoodTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function createFood()
    {
        $promotion = factory(App\Promotion::class)->create();
        $food = factory(App\Food::class)->create([
            'promotion_id' => $promotion->id,
        ]);
        $this->assertInstanceOf(Food::class, $food);
        $this->assertDatabaseHas('foods', [
            'name' => $food->name,
            'slug' => $food->slug,
            'description' => $food->description,
            'content' => $food->content,
            'price' => $food->price,
            'top' => $food->top,
            'new' => $food->new,
        ]);
    }

    /** @test */
    public function showFood()
    {
        $food = factory(App\Food::class)->create();
        $foodRepo = new FoodRepository(new Food);
        $found = $foodRepo->findOrFail($food->id);
        $this->assertInstanceOf(Food::class, $food);
        $this->assertEquals($found->name, $food->name);
        $this->assertEquals($found->slug, $food->slug);
        $this->assertEquals($found->description, $food->description);
        $this->assertEquals($found->content, $food->content);
        $this->assertEquals($found->price, $food->price);
        $this->assertEquals($found->top, $food->top);
        $this->assertEquals($found->new, $food->new);
    }

    /** @test */
    public function deleteFood()
    {
        $food = factory(App\Food::class)->create();
        $foodRepo = new FoodRepository(new Food);
        $delete = $foodRepo->delete($food->id);
        $this->assertTrue($delete);
    }
}
