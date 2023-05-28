<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealRequest;
use App\Models\Meal;
use App\Models\User;
use App\Services\MealService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class MealController extends Controller {
    public function __construct(private readonly MealService $mealService) {}

    public function indexAll(): Collection {
        return Meal::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user): Collection {
        return $user->meals;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MealRequest $request, User $user): Meal {
        return $this->mealService->create($request->validated(), $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal): Meal {
        return $meal;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MealRequest $request, Meal $meal): Meal {
        return $this->mealService->update($request->validated(), $meal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal): Response {
        $meal->delete();

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
