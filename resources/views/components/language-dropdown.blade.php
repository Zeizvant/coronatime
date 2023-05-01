<div @click.outside="show = false" x-data="{show: false}" class="relative inline-block text-left">
    <div>
        <button @click="show = !show" type="button" class="main-dark font-normal inline-flex w-full justify-center gap-x-1.5  bg-white px-3 py-2 text-sm text-gray-900 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
            {{ app()->getLocale() == 'en' ? 'English' : 'ქართული' }}
            <x-icons.dropdown-icon />
        </button>
    </div>
    <div x-show="show" class="absolute right-0 z-10 mt-2 w-full origin-top-right rounded-md bg-white shadow-lg focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div @click="show = !show" class="py-1" role="none">
            <a href="{{ route('language.change', [app()->getLocale() == 'en' ? 'ka' : 'en']) }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">{{ app()->getLocale() == 'en' ? 'ქართული' : 'English' }}</a>
        </div>
    </div>
</div>
