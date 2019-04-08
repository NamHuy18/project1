<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Promotion;
use App\Repositories\PromotionRepository;

class PromotionTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function showPromotion()
    {
        $promotion = factory(App\Promotion::class)->create();
        $promotionRepo = new PromotionRepository(new Promotion);
        $found = $promotionRepo->findOrFail($promotion->id);
        $this->assertInstanceOf(Promotion::class, $promotion);
        $this->assertEquals($found->discount, $promotion->discount);
    }

    /** @test */
    public function createPromotion()
    {
        $fakePromotion = factory(App\Promotion::class)->create();     
        $data = [
            'discount' => $fakePromotion->discount,
            'start_date' => $fakePromotion->start_date,
            'end_date' => $fakePromotion->end_date,
        ];
        $promotionRepo = new PromotionRepository(new Promotion);
        $promotion = $promotionRepo->createPromotion($data);
        $this->assertInstanceOf(Promotion::class, $promotion);
        $this->assertEquals($data['discount'], $promotion->discount);
        $this->assertEquals($data['start_date'], $promotion->start_date);
        $this->assertEquals($data['end_date'], $promotion->end_date);
        $this->assertDatabaseHas('promotions', [
            'discount' => $promotion->discount,
            'start_date' => $promotion->start_date,
            'end_date' => $promotion->end_date,
        ]);
    }

     /** @test */
     public function updatePromotion()
     {
        $promotion = factory(App\Promotion::class)->create(); 
        $data = [
             'discount' => '50',
        ];
        $promotionRepo = new PromotionRepository($promotion);
        $update = $promotionRepo->updatePromotion($data);
        $this->assertTrue($update);
        $this->assertEquals($data['discount'], $promotion->discount);
     }

    /** @test */
    public function deletePromotion()
    {
        $promotion = factory(App\Promotion::class)->create();
        $promotionRepo = new PromotionRepository(new Promotion);
        $delete = $promotionRepo->delete($promotion->id);
        $this->assertTrue($delete);
    }
}
