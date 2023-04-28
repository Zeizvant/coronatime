@props(['name', 'label', 'placeholder'])
<div class="flex flex-col gap-2">
    <label for="password">
        <span class="block font-bold text-sm md:text-base">{{$label}}</span>
        <input id="password" name="{{$name}}" type="password" class="mt-1 px-6 py-3 font-normal md:text-base bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1" placeholder="{{ $placeholder }}"/>
    </label>
</div>
