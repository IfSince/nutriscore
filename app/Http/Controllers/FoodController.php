<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Models\food;
use App\Services\FoodService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class FoodController extends Controller {
    public function __construct(private readonly FoodService $foodService) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request) {
        return $this->foodService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food): Food {
        return $food;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, Food $food): Food {
        return $this->foodService->update($request->validated(), $food);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food): Response {
        $food->delete();

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
