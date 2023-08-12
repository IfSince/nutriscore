<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RegisterService {
    public function __construct(
        public UserService $userService,
        public WeightRecordingService $weightRecordingService,
        public NutritionalDataService $nutritionalDataService,
        public IndividualMacroDistributionService $individualMacroDistributionService,
    ) {
    }

    public function register(array $data): void {
        DB::beginTransaction();

        $user = $this->userService->create($data['user']);

        $this->weightRecordingService->create($data['weightRecording'], $user);
        $nutritionalData = $this->nutritionalDataService->create($data['nutritionalData'], $user);

        if ($user->nutritionalData->requiresIndividualMacroDistribution()) {
            $this->individualMacroDistributionService->create($data['individualMacroDistribution'], $nutritionalData);
        }

        $allergenicIds = (new Collection($data['allergenics']))->map(fn(array $category) => $category['id']);

        $user->allergenics()->attach($allergenicIds);

        DB::commit();
    }
}
