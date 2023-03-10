<?php

use NutriScore\Utils\CSRFToken;

$messages = $messages ?? null;

getTemplatePart('head', ['title' => 'profile', 'module' => 'profile']);
getTemplatePart('header', ['active' => 'profile']);
?>

<div class="pt-14 lg:pt-0 lg:pl-60 h-full w-full">
  <section class="px-6 md:px-10 lg:px-20 pt-6 pb-3 md:pb-6 lg:py-10 bg-gradient-to-b from-gray-600 to-gray-800 relative">
    <div class="lg:mt-16 flex flex-col md:flex-row flex-wrap gap-x-28">
      <form class="flex pb-3" method="post" enctype="multipart/form-data" id="profileForm">
        <div class="flex flex-col relative">
          <label for="upload"
                 class="cursor-pointer bg-gray-100 rounded-full w-20 h-20 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-36 lg:h-36
                        overflow-hidden flex justify-center items-center group relative">
            <img src="<?=$profileImage?->getPath() ?? '/assets/images/profile_img.svg'?>"
                 alt="<?=$profileImage?->getText() ?? 'Uploaded profile image'?>"
                 data-profile-img
                 class="w-full h-full object-cover transition-opacity group-hover:opacity-50">
            <div class="absolute w-12 h-12 transition-opacity opacity-0 group-hover:opacity-100">
              <span class="material-icons text-5xl text-gray-800">upload_file</span>
            </div>
          </label>
          <button class="absolute top-0 right-0 w-10 h-10 bg-green rounded-full hidden
                         flex justify-center items-center shadow-underlined transition-colors hover:bg-green-hover"
                  type="submit"
                  data-submit>
            <span class="material-icons text-white text-xl">publish</span>
          </button>
          <input type="file" id="upload" name="upload" accept="image/*" hidden>
        </div>
        <div class="flex flex-col pt-4 md:pt-6 ml-4 sm:ml-6 md:ml-8 lg:ml-10">
          <span class="text-white/90 font-medium text-2xl sm:text-3xl md:text-3xl lg:text-5xl"><?=$person->getFullname()?></span>
          <span class="text-white/70 text-lg md:pt-2 sm:text-xl md:text-xl lg:text-2xl"><?=$person->getFormattedDate()?></span>
        </div>
      </form>
      <ul class="text-sm font-medium text-red-500 pl-2 pt-1 w-full">
        <?php renderFieldErrors($errors ?? null, 'file');?>
      </ul>
    </div>
  </section>

  <section class="w-full bg-gray-100 pb-10 py-6 md:px-4">
    <?php getTemplatePart('global-messages', ['messages' => $messages]);?>
    <div class="bg-white md:rounded-md px-6 pt-4 pb-10 shadow-border flex-grow basis-1/2 min-w-[300px]">
      <h3 class="font-medium text-gray-700 text-2xl tracking-tight ">
        <?=_('Actions')?>
      </h3>
      <div class="border-b border-b-gray-200 pb-3"></div>
      <div class="mt-3 flex flex-col md:flex-row sm:gap-6">
        <div class="md:max-w-sm px-6 sm:p-6 bg-white border border-gray-200 rounded-lg shadow flex justify-between sm:flex-col">
          <a href="/weight/add" class="flex items-center">
            <h5 class="sm:mb-2 sm:text-2xl font-medium tracking-wide md:tracking-tight text-gray-700"><?=_('Add Weight Recording')?></h5>
          </a>
          <p class="mb-5 font-normal text-gray-500 hidden sm:block">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at distinctio dolorem dolorum fuga
          </p>
          <a class="inline-flex transition-colors items-center px-3 py-2 sm:text-sm font-medium text-center text-green
                    sm:text-white sm:bg-green rounded-lg hover:text-green-hover sm:hover:text-white
                    sm:hover:bg-green-hover focus:outline-2 focus:outline-green-darker h-fit w-fit"
             href="/weight/add">
            <?=_('Add Weight')?>
            <span class="material-icons ml-2 -mr-1 text-xl font-medium sm:text-lg">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>


    <div class="mt-8 bg-white md:rounded-md px-6 pt-4 pb-10 shadow-border flex-grow basis-1/2 min-w-[300px]">
      <h3 class="font-medium text-gray-700 text-2xl tracking-tight ">
        <?=_('My Account Data')?>
      </h3>
      <div class="border-b border-b-gray-200 pb-3"></div>
      <div class="mt-3 flex flex-col md:flex-row sm:gap-6">
        <div class="md:max-w-sm px-6 sm:p-6 bg-white border border-gray-200 rounded-lg shadow flex justify-between sm:flex-col">
          <a href="profile/user-data" class="flex items-center">
            <h5 class="sm:mb-2 sm:text-2xl font-medium tracking-wide md:tracking-tight text-gray-700"><?=_('User Data')?></h5>
          </a>
          <p class="mb-5 font-normal text-gray-500 hidden sm:block">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at distinctio dolorem dolorum fuga
          </p>
          <a class="inline-flex transition-colors items-center px-3 py-2 sm:text-sm font-medium text-center text-green
                    sm:text-white sm:bg-green rounded-lg hover:text-green-hover sm:hover:text-white
                    sm:hover:bg-green-hover focus:outline-2 focus:outline-green-darker h-fit w-fit"
             href="profile/user-data">
            <?=_('Edit Data')?>
            <span class="material-icons ml-2 -mr-1 text-xl font-medium sm:text-lg">arrow_forward</span>
          </a>
        </div>

        <div class="md:max-w-sm px-6 sm:p-6 bg-white border border-gray-200 rounded-lg shadow flex justify-between sm:flex-col">
          <a href="profile/personal-data" class="flex items-center">
            <h5 class="sm:mb-2 sm:text-2xl font-medium tracking-wide md:tracking-tight text-gray-700"><?=_('Personal Data')?></h5>
          </a>
          <p class="mb-5 font-normal text-gray-500 hidden sm:block">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at distinctio dolorem dolorum fuga
          </p>
          <a class="inline-flex transition-colors items-center px-3 py-2 sm:text-sm font-medium text-center text-green
                    sm:text-white sm:bg-green rounded-lg hover:text-green-hover sm:hover:text-white
                    sm:hover:bg-green-hover focus:outline-2 focus:outline-green-darker h-fit w-fit"
             href="profile/personal-data">
            <?=_('Edit Data')?>
            <span class="material-icons ml-2 -mr-1 text-xl font-medium sm:text-lg">arrow_forward</span>
          </a>
        </div>

        <div class="md:max-w-sm px-6 sm:p-6 bg-white border border-gray-200 rounded-lg shadow flex justify-between sm:flex-col">
          <a href="profile/nutritional-data" class="flex items-center">
            <h5 class="sm:mb-2 sm:text-2xl font-medium tracking-wide md:tracking-tight text-gray-700"><?=_('Nutritional Data')?></h5>
          </a>
          <p class="mb-5 font-normal text-gray-500 hidden sm:block">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at distinctio dolorem dolorum fuga
          </p>
          <a class="inline-flex transition-colors items-center px-3 py-2 sm:text-sm font-medium text-center text-green
                    sm:text-white sm:bg-green rounded-lg hover:text-green-hover sm:hover:text-white
                    sm:hover:bg-green-hover focus:outline-2 focus:outline-green-darker h-fit w-fit"
             href="profile/nutritional-data">
            <?=_('Edit Data')?>
            <span class="material-icons ml-2 -mr-1 text-xl font-medium sm:text-lg">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>

    <div class="mt-8 bg-white md:rounded-md px-6 pt-4 pb-10 shadow-border flex-grow basis-1/2 min-w-[300px]">
      <h3 class="font-medium text-gray-700 text-2xl tracking-tight ">
        <?=_('Account Settings')?>
      </h3>
      <div class="border-b border-b-gray-200 pb-3"></div>
      <div class="mt-3 flex flex-col md:flex-row sm:gap-6">
        <div class="md:max-w-sm px-6 sm:p-6 bg-white border border-gray-200 rounded-lg shadow flex justify-between sm:flex-col">
          <a href="/profile/change-password" class="flex items-center">
            <h5 class="sm:mb-2 sm:text-2xl font-medium tracking-wide md:tracking-tight text-gray-700"><?=_('Change Password')?></h5>
          </a>
          <p class="mb-5 font-normal text-gray-500 hidden sm:block">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at distinctio dolorem dolorum fuga
          </p>
          <a class="inline-flex transition-colors items-center px-3 py-2 sm:text-sm font-medium text-center text-green
                    sm:text-white sm:bg-green rounded-lg hover:text-green-hover sm:hover:text-white
                    sm:hover:bg-green-hover focus:outline-2 focus:outline-green-darker h-fit w-fit"
             href="/profile/change-password">
            <?=_('Edit Data')?>
            <span class="material-icons ml-2 -mr-1 text-xl font-medium sm:text-lg">arrow_forward</span>
          </a>
        </div>

        <div class="md:max-w-sm px-6 sm:p-6 bg-white border border-gray-200 rounded-lg shadow flex justify-between sm:flex-col">
          <a href="/user/logout?csrfToken=<?=CSRFToken::get()?>" class="flex items-center">
            <h5 class="sm:mb-2 sm:text-2xl font-medium tracking-wide md:tracking-tight text-gray-700"><?=_('Sign Out')?></h5>
          </a>
          <p class="mb-5 font-normal text-gray-500 hidden sm:block">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at distinctio dolorem dolorum fuga
          </p>
          <a class="inline-flex transition-colors items-center px-3 py-2 sm:text-sm font-medium text-center text-green
                    sm:text-white sm:bg-green rounded-lg hover:text-green-hover sm:hover:text-white
                    sm:hover:bg-green-hover focus:outline-2 focus:outline-green-darker h-fit w-fit"
             href="/user/logout?csrfToken=<?=CSRFToken::get()?>">
            <?=_('Edit Data')?>
            <span class="material-icons ml-2 -mr-1 text-xl font-medium sm:text-lg">arrow_forward</span>
          </a>
        </div>

        <div class="md:max-w-sm px-6 sm:p-6 bg-white border border-gray-200 rounded-lg shadow flex justify-between sm:flex-col">
          <a href="#" class="flex items-center">
            <h5 class="sm:mb-2 sm:text-2xl font-medium tracking-wide md:tracking-tight text-gray-700"><?=_('Delete Account')?></h5>
          </a>
          <p class="mb-5 font-normal text-gray-500 hidden sm:block">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at distinctio dolorem dolorum fuga
          </p>
          <a class="inline-flex transition-colors items-center px-3 py-2 sm:text-sm font-medium text-center text-red-600
                    sm:text-white sm:bg-red-600 rounded-lg hover:text-red-800 sm:hover:text-white
                    sm:hover:bg-red-800 focus:outline-2 focus:outline-red-900 h-fit w-fit"
             href="#">
            <?=_('Delete')?>
            <span class="material-icons ml-2 -mr-1 text-xl font-medium sm:text-lg">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>