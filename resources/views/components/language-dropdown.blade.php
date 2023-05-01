<div @click.outside="show = false" x-data="{show: false}" class="relative inline-block text-left">
    <div>
        <button @click="show = !show" type="button" class="main-dark font-normal inline-flex w-full justify-center gap-x-1.5  bg-white px-3 py-2 text-sm text-gray-900 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
            English
            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div x-show="show" class="absolute right-0 z-10 mt-2 w-full origin-top-right rounded-md bg-white shadow-lg focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div @click="show = !show" class="py-1" role="none">
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">ქართული</a>
        </div>
    </div>
</div>
