<x-blank_layout>
    <div class="h-full">
        <h2 class="text-center font-black text-xl md:text-2xl main-dark mb-10 md:mb-14">{{ __('forms.reset password') }}</h2>
        <form action="POST" class="flex flex-col justify-between h-[450px] md:justify-start md:gap-14 gap-6">
            <div class="flex flex-col gap-4 md:gap-6">
                <div class="flex flex-col gap-2">
                    <label for="password">
                        <span class="mb-2 block font-bold text-sm md:text-base">{{ __('forms.new password') }}</span>
                        <input id="password" name="password" type="password" class="mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1" placeholder="{{ __('forms.enter new password') }}"/>
                    </label>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="password_confirmation">
                        <span class="mb-2 block font-bold text-sm md:text-base">{{ __('forms.repeat password') }}</span>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1" placeholder="{{ __('forms.repeat password') }}"/>
                    </label>
                </div>
            </div>
            <x-form-button text="{{ __('forms.log in') }}"></x-form-button>
        </form>
    </div>
</x-blank_layout>
