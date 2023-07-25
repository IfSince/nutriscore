<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Http\Resources\FoodResource;
use App\Models\food;
use App\Services\FoodService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class FoodController extends Controller {
    public function __construct(private readonly FoodService $foodService) { }

    public function index(): AnonymousResourceCollection {
        return FoodResource::collection(Food::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request): FoodResource {
        return FoodResource::make($this->foodService->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food): FoodResource {
        return FoodResource::make($food);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, Food $food): FoodResource {
        return FoodResource::make($this->foodService->update($request->validated(), $food));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food): Response {
        $food->delete();

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
