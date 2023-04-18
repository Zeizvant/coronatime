<x-blank_layout>
    <div>
        <h2 class="font-black text-xl md:text-2xl main-dark mb-2 md:mb-4">{{ __('forms.reset password') }}</h2>
        <form action="POST" class="flex flex-col justify-between md:justify-start md:gap-14 h-[500px] gap-6">
            <div class="flex flex-col gap-2">
                <label for="password flex flex-col">
                    <span class="block font-bold text-sm md:text-base md:mb-14">{{ __('forms.password') }}</span>
                    <input id="password" name="password" type="password" class="mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1" placeholder="{{ __('forms.fill in password') }}"/>
                </label>
            </div>
            <x-form-button text="{{ __('forms.log in') }}"></x-form-button>
        </form>
    </div>
</x-blank_layout>
