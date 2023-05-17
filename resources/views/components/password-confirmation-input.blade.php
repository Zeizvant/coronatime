@props(['name', 'label', 'placeholder'])
<div class="flex flex-col gap-2 relative">
    <label for="password_confirmation">
        <span class="mb-2 block font-bold text-sm md:text-base">{{ $label }}</span>
        <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            class="@if($errors->has($name)) border-[#CC1E1E] @endif mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1"
            placeholder="{{ __('forms.repeat_password') }}"/>
        @if($errors->has($name))
            <div class="text-[#CC1E1E] position absolute -bottom-10 md:-bottom-8 text-sm flex">
                <img class="w-5" src="{{ asset('images/error.png') }}" />
                <p>{{ $errors->get($name)[0] }}</p>
            </div>
        @endif
    </label>
</div>
