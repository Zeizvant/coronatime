<thead class="sticky top-0 z-10">
<tr class="bg-[#F6F6F7] h-14">
    <th class="md:w-[265px]">
        <div class="flex gap-2.5">
            <div class="pl-2 md:pl-10 main-dark font-semibold text-[8px] md:text-sm">{{ __('landing.location') }}</div>
            <div>
                <template x-if="buttonId != 1">
                    <img @click="sort('country', false); buttonId=1" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up.png') }}">
                </template>
                <template x-if="buttonId == 1">
                    <img @click="sort('country', false); buttonId=1" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up-clicked.png') }}">
                </template>
                <template x-if="buttonId != 2">
                    <img @click="sort('country', true); buttonId=2" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up.png') }}">
                </template>
                <template x-if="buttonId == 2">
                    <img @click="sort('country', true); buttonId=2" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up-clicked.png') }}">
                </template>
            </div>
        </div>
    </th>
    <th class="md:w-[225px]">
        <div class="flex gap-2.5">
            <div class="main-dark font-semibold text-[8px] md:text-sm">{{ __('landing.new_cases') }}</div>
            <div>
                <template x-if="buttonId != 3">
                    <img @click="sort('confirmed', false); buttonId=3" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up.png') }}">
                </template>
                <template x-if="buttonId == 3">
                    <img @click="sort('confirmed', false); buttonId=3" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up-clicked.png') }}">
                </template>
                <template x-if="buttonId != 4">
                    <img @click="sort('confirmed', true); buttonId=4" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up.png') }}">
                </template>
                <template x-if="buttonId == 4">
                    <img @click="sort('confirmed', true); buttonId=4" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up-clicked.png') }}">
                </template>
            </div>
        </div>
    </th>
    <th class="md:w-[225px]">
        <div class="flex gap-2.5">
            <div class="main-dark font-semibold text-[8px] md:text-sm">{{ __('landing.deaths') }}</div>
            <div>
                <template x-if="buttonId != 5">
                    <img @click="sort('deaths', false); buttonId=5" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up.png') }}">
                </template>
                <template x-if="buttonId == 5">
                    <img @click="sort('deaths', false); buttonId=5" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up-clicked.png') }}">
                </template>
                <template x-if="buttonId != 6">
                    <img @click="sort('deaths', true); buttonId=6" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up.png') }}">
                </template>
                <template x-if="buttonId == 6">
                    <img @click="sort('deaths', true); buttonId=6" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up-clicked.png') }}">
                </template>
            </div>
        </div>
    </th>
    <th>
        <div class="flex gap-2.5">
            <div class="main-dark font-semibold text-[8px] md:text-sm">{{ __('landing.recovered') }}</div>
            <div>
                <template x-if="buttonId != 7">
                    <img @click="sort('recovered', false); buttonId=7" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up.png') }}">
                </template>
                <template x-if="buttonId == 7">
                    <img @click="sort('recovered', false); buttonId=7" class="w-2.5 cursor-pointer" src="{{ asset('images/arrow-up-clicked.png') }}">
                </template>
                <template x-if="buttonId != 8">
                    <img @click="sort('recovered', true); buttonId=8" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up.png') }}">
                </template>
                <template x-if="buttonId == 8">
                    <img @click="sort('dearecoveredths', true); buttonId=8" class="w-2.5 cursor-pointer rotate-180" src="{{ asset('images/arrow-up-clicked.png') }}">
                </template>
            </div>
        </div>
    </th>
</tr>
</thead>
