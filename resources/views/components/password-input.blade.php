@props(['name', 'label', 'placeholder'])
<div class="flex flex-col gap-2 relative">
    <label for="password">
        <span class="block font-bold text-sm md:text-base">{{$label}}</span>
        <input required
               id="password"
               x-model="password"
               :class="validation.password.error === 'true' ? 'border-[#CC1E1E] focus:invalid:border-[#CC1E1E] focus:invalid:ring-[#CC1E1E]' : validation.{{ $name }}.error === 'false' ? 'border-[#249E2C]' : ''"
               name="{{$name}}"
               type="password"
               class="@error($name) border-[#CC1E1E] focus:invalid:border-[#CC1E1E] focus:invalid:ring-[#CC1E1E] @enderror mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full focus:valid:border-[#249E2C] focus:valid:ring-[#249E2C] rounded-md text-sm focus:ring-1"
               placeholder="{{ $placeholder }}"/>
        <img x-show="validation.{{ $name }}.error === 'false'" src="{{ asset('images/passed.png') }}" class="absolute top-1/2 right-4"/>
        <div class="text-[#CC1E1E] position absolute -bottom-10 md:-bottom-8 text-sm flex items-center">
            <img class="w-5" x-show="validation.password.error === 'true'" src="{{ asset('images/error.png') }}" />
            <p x-text="validation.password.message"></p>
        </div>
        <div x-show="validation.password.error === 'none' " >
            @error($name)
            <div class="text-[#CC1E1E] position absolute -bottom-10 md:-bottom-8 text-sm flex">
                <img class="w-5" src="{{ asset('images/error.png') }}" />
                <p>{{ $message }}</p>
            </div>
            @enderror
        </div>
    </label>
</div>
