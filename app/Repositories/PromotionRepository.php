<?php

namespace App\Repositories;

use App\Promotion;
use App\Http\Requests\PromotionRequest;

class PromotionRepository
{   
    public function __construct(Promotion $promotion)
    {
        $this->model = $promotion;
    }

    /**
     * @param array $data
     * @return Promotion
     * @throws CreatePromotionErrorException
     */
    public function createPromotion(array $data) : Promotion
    {
        try 
        {
            return $this->model->create($data);
        } 
        catch (QueryException $e) 
        {
            throw new CreatePromotionErrorException($e);
        }
    }

    /**
     * @param array $data
     * @return bool
     * @throws UpdatePromotionErrorException
     */
    public function updatePromotion(array $data) : bool
    {
        try 
        {
            return $this->model->update($data);
        } 
        catch (QueryException $e) 
        {
            throw new UpdatePromotionErrorException($e);
        }
    }

    public function all()
    {
        return Promotion::paginate(config('pagination.promotion'));
    }

    public function findOrFail($id)
    {
        return Promotion::findOrFail($id);
    }

    public function add(PromotionRequest $request)
    {
        $promotion = new Promotion;
        $promotion->create([
            'discount' => $request->get('discount'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ]);
    }

    public function update(PromotionRequest $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        $validated = $request->validated();
        $promotion->update([
            'discount' => $request->get('discount'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ]);
    }

    public function delete($id)
    {
        $this->findOrFail($id)->delete();

        return true;
    }
}
