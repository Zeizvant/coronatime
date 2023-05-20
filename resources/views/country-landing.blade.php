<x-landing-layout header="{{ __('landing.statistics_by_country') }}" section="country">
    <div class="flex flex-col"
         x-init="$watch('search', (val) => localStorage.setItem('search', val))"
         x-data="{
            countries: @js($countries),
            locale: {{ json_encode(app()->getLocale()) }},
            search: localStorage.getItem('search') || '',
            sortCol: '',
            buttonId: 0,
            show_item(el) {
                return this.search === '' || el.getAttribute('data').includes(this.search) || el.getAttribute('data').toLowerCase().includes(this.search)
            },
            sort(col, asc){
                if(this.sortCol === col);
                    this.sortCol = col;
                    if(col === 'country'){
                        this.countries.sort((a, b) => {
                            if(a.country_name.name[this.locale] < b.country_name.name[this.locale]) return asc?1:-1;
                            else if(a.country_name.name[this.locale] > b.country_name.name[this.locale]) return asc?-1:1;
                            return 0;
                        });
                    }
                    else{
                        this.countries.sort((a, b) => {
                            if(a[this.sortCol] < b[this.sortCol]) return asc?1:-1;
                            else if(a[this.sortCol] > b[this.sortCol]) return asc?-1:1;
                            return 0;
                        });
                    }

            },
          }"
    >
        <div class="w-60 relative">
            <div class="relative mt-6 md:mt-10 rounded-md md:shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="text-gray-500 sm:text-sm">
                        <img class="w-[18px]" src="{{ asset('images/search.svg') }}">
                    </span>
                </div>
                <input x-init="search = localStorage.getItem('search') || ''" x-model="search" type="text" name="price" id="price" class="block w-full rounded-md border-0 py-1.5 pl-11 pr-5 text-gray-900 md:ring-1 md:ring-inset md:ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 text-sm sm:leading-6" placeholder="{{ __('landing.search_by_country') }}">
            </div>
        </div>
        <div class="mt-20 md:mt-10 w-full h-[358px] md:h-[570px] overflow-y-scroll md:mb-10 absolute left-0 md:relative overflow-x-hidden">
            <x-statistics-table recovered="{{ $recovered }}" confirmed="{{ $confirmed }}" deaths="{{ $deaths }}" :countries="$countries"></x-statistics-table>
        </div>
    </div>
</x-landing-layout>
