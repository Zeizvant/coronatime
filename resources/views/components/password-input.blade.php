@props(['name', 'label', 'placeholder', 'register'])
<div class="flex flex-col gap-2 relative">
    <label for="password">
        <span class="block font-bold text-sm md:text-base">{{$label}}</span>
        <input id="password"
               name="{{$name}}"
               type="password"
               class="@if($errors->has($name)) border-[#CC1E1E] @endif mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1"
               placeholder="{{ $placeholder }}"/>
        @if($errors->has($name))
            <div class="flex items-center text-[#CC1E1E] absolute h-[40px] -bottom-10 md:-bottom-10  text-sm flex">
                <img class="w-5 h-5" src="{{ asset('images/error.png') }}" />
                <p>{{ $errors->get($name)[0] }}</p>
            </div>
        @endif
    </label>
</div>
