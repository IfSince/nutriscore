<?php

namespace App\Services;

class RegisterService {
    public function __construct(
        public UserService $userService,
        public WeightRecordingService $weightRecordingService,
        public NutritionalDataService $nutritionalDataService,
        public IndividualMacroDistributionService $individualMacroDistributionService,
    ) {
    }

    public function register(array $data): void {
        $user = $this->userService->create($data['user']);

        $data['weightRecording']['userId'] = $user->id;
        $this->weightRecordingService->create($data['weightRecording']);

        $data['nutritionalData']['userId'] = $user->id;
        $nutritionalData = $this->nutritionalDataService->create($data['nutritionalData']);

        if (isset($data['individualMacroDistribution']) && !empty($data['individualMacroDistribution'])) {
            $data['individualMacroDistribution']['nutritionalDataId'] = $nutritionalData->id;
            $this->individualMacroDistributionService->create($data['individualMacroDistribution']);
        }

        $user->allergenics()->attach($data['allergenicIds']);
    }
}
