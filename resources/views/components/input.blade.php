@props(['name', 'type', 'label', 'placeholder'])
<div class="flex flex-col gap-2 relative">
    <label for="{{$name}}">
        <span class="block font-bold text-sm md:text-base">{{ $label }}</span>
        <input id="{{$name}}"
               name="{{$name}}"
               type="{{$type}}"
               value="{{ old($name) }}"
               class="@if($errors->has($name)) border-[#CC1E1E] @elseif(count($errors) == 1 and !$errors->has($name)) border-[#249E2C] @endif mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1"
               placeholder="{{$placeholder}}"/>
        @if($errors->has($name))
            <div class="text-[#CC1E1E] absolute -bottom-8 md:-bottom-8 text-sm flex">
                <img class="w-5" src="{{ asset('images/error.png') }}" />
                <p>{{ $errors->get($name)[0] }}</p>
            </div>
        @elseif(count($errors) == 1 and !$errors->has($name))
            <img src="{{ asset('images/passed.png') }}" class="absolute top-1/2 right-4"/>
        @endif
    </label>
</div>
