<thead class="sticky top-0 z-10">
<tr class="bg-[#F6F6F7] h-14">
    <th class="md:w-[265px]">
        <div class="flex gap-2.5">
            <div class="pl-2 md:pl-10 main-dark font-semibold text-[8px] md:text-sm">{{ __('landing.location') }}</div>
            <div>
                <img @click="sort('country', false)" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up.png') }}">
                <img @click="sort('country', true)" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up.png') }}">
            </div>
        </div>
    </th>
    <th class="md:w-[225px]">
        <div class="flex gap-2.5">
            <div class="main-dark font-semibold text-[8px] md:text-sm">{{ __('landing.new_cases') }}</div>
            <div>
                <img @click="sort('confirmed', false)" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up.png') }}">
                <img @click="sort('confirmed', true)" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up.png') }}">
            </div>
        </div>
    </th>
    <th class="md:w-[225px]">
        <div class="flex gap-2.5">
            <div class="main-dark font-semibold text-[8px] md:text-sm">{{ __('landing.deaths') }}</div>
            <div>
                <img @click="sort('deaths', false)" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up.png') }}">
                <img @click="sort('deaths', true)" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up.png') }}">
            </div>
        </div>
    </th>
    <th>
        <div class="flex gap-2.5">
            <div class="main-dark font-semibold text-[8px] md:text-sm">{{ __('landing.recovered') }}</div>
            <div>
                <img @click="sort('recovered', false)" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up.png') }}">
                <img @click="sort('recovered', false)" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up.png') }}">
            </div>
        </div>
    </th>
</tr>
</thead>
