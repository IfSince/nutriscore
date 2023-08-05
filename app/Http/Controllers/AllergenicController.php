<?php

namespace App\Http\Controllers;

use App\Http\Resources\DescriptiveResource;
use App\Models\Allergenic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AllergenicController extends Controller {
    public function index(): AnonymousResourceCollection {
        return DescriptiveResource::collection(Allergenic::all());
    }

    public function showByUser(User $user): AnonymousResourceCollection {
        return DescriptiveResource::collection($user->allergenics);
    }

    public function updateByUser(Request $request, User $user): AnonymousResourceCollection {
        $user->allergenics()->sync($request->get('allergenicIds'));
        $user->save();

        return DescriptiveResource::collection($user->allergenics);
    }
}
