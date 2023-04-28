<x-auth-layout>
    <div>
        <h2 class="font-black text-xl md:text-2xl main-dark mb-2 md:mb-4">{{ __('forms.welcome_back') }}</h2>
        <p class="text-base md:text-xl font-normal main-grey mb-6">{{ __('forms.welcome_back_please_enter_your_details') }}</p>
        <form action="POST" class="flex flex-col gap-6">
            <div class="flex flex-col gap-2">
                <label for="username">
                    <span class="block font-bold text-sm md:text-base">{{ __('forms.username') }}</span>
                    <input id="username" name="username" type="text" class="mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1" placeholder="{{ __('forms.enter_unique_username_or_email') }}"/>
                </label>
            </div>
            <div class="flex flex-col gap-2">
                <label for="password">
                    <span class="block font-bold text-sm md:text-base">{{ __('forms.password') }}</span>
                    <input id="password" name="password" type="password" class="mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1" placeholder="{{ __('forms.fill_in_password') }}"/>
                </label>
            </div>
            <div class="flex justify-between items-center">
                <label class="flex items-center gap-2">
                    <input type="checkbox" class="checked:checkbox-color-green w-5 h-5" />
                    <span class="main-dark text-sm md:text-base font-semibold">{{ __('forms.remember_this_device') }}</span>
                </label>
                <a href="#" class="text-sm md:text-base font-semibold text-[#2029F3]">{{ __('forms.forgot_password?') }}</a>
            </div>
            <x-form-button text="{{ __('forms.log_in') }}"></x-form-button>
            <p class="text-sm md:text-base text-center font-normal ">{{ __('forms.don’t_have_an_account?') }} <a href="#" class="font-semibold">{{ __('forms.sign_up_for_free') }}</a></p>
        </form>
    </div>
</x-auth_layout>
