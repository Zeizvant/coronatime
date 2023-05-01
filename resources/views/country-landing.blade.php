<x-landing-layout header="{{ __('landing.statistics_by_country') }}" section="country">
    <div class="flex flex-col">
        <div class="w-60">
            <div class="relative mt-6 md:mt-10 rounded-md md:shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="text-gray-500 sm:text-sm">
                        <img class="w-[18px]" src="{{ asset('images/search.svg') }}">
                    </span>
                </div>
                <input type="text" name="price" id="price" class="block w-full rounded-md border-0 py-1.5 pl-11 pr-5 text-gray-900 md:ring-1 md:ring-inset md:ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 text-sm sm:leading-6" placeholder="{{ __('landing.search_by_country') }}">
            </div>
        </div>
        <div class="mt-6 md:mt-10 w-full">
            <x-statistics-table recovered="{{ $recovered }}" confirmed="{{ $confirmed }}" deaths="{{ $deaths }}" :countries="$countries"></x-statistics-table>
        </div>
    </div>
</x-landing-layout>
