<?php use NutriScore\Models\Person\ActivityLevel;
use NutriScore\Models\Person\BmrCalculationType;
use NutriScore\Models\Person\Goal;
use NutriScore\Models\Person\NutritionType;

$messages = $messages ?? []; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <title>Register</title>

  <link rel="stylesheet" type="text/css" href="assets/styles/material-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/styles/dist/tailwind.css">

  <script type="module" src="/assets/scripts/registration/registration-quest.js" defer></script>
</head>
<body class="flex md:justify-center md:items-center overflow-x-hidden lg:h-screen lg:w-screen">
  <div class="w-full md:min-h-screen flex flex-col md:flex-row md:max-w-5xl lg:min-h-[600px] lg:h-fit
              lg:shadow-underlined lg:rounded-2xl lg:overflow-hidden">
    <div class="fixed md:relative h-64 md:h-auto bg-green w-full pb-7 md:pb-0 px-7 shadow-lg md:shadow-none
                flex flex-col justify-end md:items-end md:justify-center max-h-64 md:max-h-full md:max-w-xs">
      <h1 class="mt-28 text-5xl text-white font-medium md:hidden"><?=_('Register')?></h1>
      <ul class="mt-12 md:mt-0 w-full max-w-md md:w-auto flex md:flex-col md:h-full md:max-h-80 self-center justify-between items-start"
          data-quest-steps-routing>
      </ul>
    </div>
    
    <div class="mt-64 md:mt-0 md:pt-12 pb-12 px-7 w-full flex-grow flex flex-col justify-evenly items-center">
      <h2 class="text-5xl text-green font-medium hidden md:block md:pt-8"><?=_('Register')?></h2>
      <form method="post" class="w-full max-w-sm" id="registrationForm">
        <div data-quest-panel="true" data-quest-step="account">
          <div class="w-full mt-8">
            <label class="default-input__label" for="username">Username</label>
            <input class="default-input" type="text" name="username" id="username" <?php renderRequestValue('username');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('username', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class="default-input__label" for="email"><?=_('E-Mail')?></label>
            <input class="default-input" type="text" name="email" id="email" <?php renderRequestValue('email');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('email', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-8">
            <label class="default-input__label" for="password"><?=_('Password')?></label>
            <input class="default-input" type="password" name="password" id="password" <?php renderRequestValue('password');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('password', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class="default-input__label" for="repeatPassword"><?=_('Repeat password')?></label>
            <input class="default-input" type="password" name="repeatPassword" id="repeatPassword" <?php renderRequestValue('repeatPassword');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('repeatPassword', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-8 ml-2">
            <div class="flex items-center">
              <input class="accent-green focus:outline-2 focus:outline-green"
                     type="checkbox"
                     name="acceptedTos"
                     id="acceptedTos"
                     <?php renderPostChecked('acceptedTos');?>>
              <label class="cursor-pointer pl-2" for="acceptedTos">
                I agree to the
                <a class="text-green cursor-pointer hover:underline focus:underline focus:outline-none" href="#">
                  Terms of Service.
                </a>
              </label>
            </div>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('acceptedTos', $messages);?>
            </ul>
          </div>
        </div>
        
        <div data-quest-panel="false" data-quest-step="personal">
          <div class="w-full mt-8">
            <label class="default-input__label" for="firstName"><?=_('First name')?></label>
            <input class="default-input" type="text" name="firstName" id="firstName" <?php renderRequestValue('firstName');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('firstName', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class="default-input__label" for="surname"><?=_('Surname')?></label>
            <input class="default-input" type="text" name="surname" id="surname" <?php renderRequestValue('surname');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('surname', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <span class="default-input__label"><?=_('Gender')?></span>
            <div class="flex justify-between px-2" id="gender">
              <div>
                <input class="accent-green focus:outline-2 focus:outline-green cursor-pointer peer"
                       type="radio"
                       id="genderMale"
                       name="gender"
                       value="MALE"
                       <?php renderPostCheckedByValue('gender', 'MALE');?>>
                <label class="text-gray-700 font-medium cursor-pointer pl-0.5 peer-checked:text-green"
                       for="genderMale"><?=_('Male')?></label>
              </div>
              <div>
                <input class="accent-green focus:outline-2 focus:outline-green cursor-pointer peer"
                       type="radio"
                       id="genderFemale"
                       name="gender"
                       value="FEMALE"
                        <?php renderPostCheckedByValue('gender', 'FEMALE');?>>
                <label class="text-gray-700 font-medium pl-0.5 peer-checked:text-green"
                       for="genderFemale"><?=_('Female')?></label>
              </div>
              <div>
                <input class="accent-green focus:outline-2 focus:outline-green cursor-pointer peer"
                       type="radio"
                       id="genderOther"
                       name="gender"
                       value="OTHER"
                        <?php renderPostCheckedByValue('gender', 'OTHER');?>>
                <label class="text-gray-700 font-medium cursor-pointer pl-0.5 peer-checked:text-green"
                       for="genderOther"><?=_('Other')?></label>
              </div>
            </div>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('gender', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-6">
            <label class="default-input__label" for="dateOfBirth"><?=_('Date of Birth')?></label>
            <input class="default-input" type="date" name="dateOfBirth" id="dateOfBirth" <?php renderRequestValue('dateOfBirth');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('dateOfBirth', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class="default-input__label" for="height"><?=_('Height (in cm)')?></label>
            <input class="default-input" type="number" name="height" id="height" <?php renderRequestValue('height');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('height', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class="default-input__label" for="weight"><?=_('Starting weight (in kg)')?></label>
            <input class="default-input" type="number" name="weight" id="weight" <?php renderRequestValue('weight');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('weight', $messages);?>
            </ul>
          </div>
        </div>
        <div data-quest-panel="false" data-quest-step="nutrition">
          <div class="w-full mt-8">
            <label class=default-input__label for="nutritionType"><?=_('Nutrition type')?></label>
            <select class="default-input" name="nutritionType" id="nutritionType">
              <?php renderEnumSelectOptions(filter_input(INPUT_POST, 'nutritionType') ?? NutritionType::NORMAL, NutritionType::class)?>
            </select>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('nutritionType', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-8">
            <label class="default-input__label" for="protein"><?=_('Protein')?></label>
            <input class="default-input" type="number" name="protein" id="protein" <?php renderRequestValue('protein');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('protein', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class="default-input__label" for="carbohydrates"><?=_('Carbohydrates')?></label>
            <input class="default-input" type="text" name="carbohydrates" id="carbohydrates" <?php renderRequestValue('carbohydrates');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('carbohydrates', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class="default-input__label" for="fat"><?=_('Fat')?></label>
            <input class="default-input" type="number" name="fat" id="fat" <?php renderRequestValue('fat');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('fat', $messages);?>
            </ul>
          </div>
        </div>

        <div data-quest-panel="false" data-quest-step="others">
          <div class="w-full mt-8">
            <label class=default-input__label for="bmrCalculationType"><?=_('BMR Calculation Type')?></label>
            <select class="default-input" name="bmrCalculationType" id="bmrCalculationType">
              <?php renderEnumSelectOptions(filter_input(INPUT_POST, 'bmrCalculationType') ?? BmrCalculationType::EASY, BmrCalculationType::class)?>
            </select>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('bmrCalculationType', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class=default-input__label for="activityLevel"><?=_('Activity Level')?></label>
            <select class="default-input" name="activityLevel" id="activityLevel">
              <?php renderEnumSelectOptions(filter_input(INPUT_POST, 'activityLevel') ?? ActivityLevel::NO_SPORTS, ActivityLevel::class)?>
            </select>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('activityLevel', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class="default-input__label" for="palLevel"><?=_('PAL Level')?></label>
            <input class="default-input" type="number" name="palLevel" id="palLevel" <?php renderRequestValue('palLevel');?>>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('palLevel', $messages);?>
            </ul>
          </div>
          <div class="w-full mt-4">
            <label class=default-input__label for="goal"><?=_('Objective')?></label>
            <select class="default-input" name="goal" id="goal">
              <?php renderEnumSelectOptions(filter_input(INPUT_POST, 'goal') ?? Goal::KEEP, Goal::class)?>
            </select>
            <ul class="text-sm font-medium text-red-500 pl-2 pt-1">
              <?php renderValidationFieldMessages('goal', $messages);?>
            </ul>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script type="module" src="/assets/scripts/registration/registration-quest.js" defer></script>
</body>
</html>