<?php

namespace App\Http\Controllers;

use App\Http\Resources\DescriptiveResource;
use App\Models\Allergenic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;

class AllergenicController extends Controller {
    public function index(): AnonymousResourceCollection {
        return DescriptiveResource::collection(Allergenic::all());
    }

    public function showByUser(User $user): AnonymousResourceCollection {
        return DescriptiveResource::collection($user->allergenics);
    }

    public function updateByUser(Request $request, User $user): AnonymousResourceCollection {
        $allergenicIds = (new Collection($request->get('allergenics')))->map(fn(array $allergenic) => $allergenic['id']);
        
        $user->allergenics()->sync($allergenicIds);
        $user->save();

        return DescriptiveResource::collection($user->allergenics);
    }
}
