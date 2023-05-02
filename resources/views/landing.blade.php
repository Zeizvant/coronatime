<x-landing-layout header="{{ __('landing.worldwide_statistics') }}" section="worldwide">
    <div class="min-w-[343px] md:mt-10 flex md:flex-col md:items-stretch mt-6 flex gap-4 md:items-center xl:flex-row md:justify-between flex-wrap">
        <div class="w-full h-[193px] md:h-[225px] box-border bg-[#2029F314] min-w-[343px] md:min-w-[393px] xl:w-[393px] rounded-2xl flex flex-col-reverse justify-center md:justify-start md:pb-8 gap-4 items-center">
            <p class="text-[#2029F3] font-black text-2xl md:text-5xl">{{ number_format($confirmed) }}</p>
            <p class="text-sm main-dark md:text-xl">{{ __('landing.new_cases') }}</p>
            <img class="w-24" src="{{ asset('images/blue-vector.png') }}" />
        </div>
        <div class="flex-1 h-[193px] md:h-[225px] box-border bg-[#249E2C14] w-full sm:min-w-[150px] md:min-w-[393px] rounded-2xl flex flex-col-reverse justify-center md:justify-start md:pb-8 gap-4 items-center">
            <p class="text-[#0FBA68;] font-black text-2xl md:text-5xl">{{ number_format($recovered) }}</p>
            <p class="text-sm main-dark md:text-xl">{{ __('landing.recovered') }}</p>
            <img class="w-24" src="{{ asset('images/green-vector.png') }}" />
        </div>
        <div class="flex-1 h-[193px] md:h-[225px] box-border bg-[#EAD62114] w-full sm:min-w-[150px] md:min-w-[393px] rounded-2xl flex flex-col-reverse justify-center md:justify-start md:pb-8 gap-4 items-center">
            <p class="text-[#EAD621] font-black text-2xl md:text-5xl">{{ number_format($deaths) }}</p>
            <p class="text-sm main-dark md:text-xl">{{ __('landing.death') }}</p>
            <img class="w-24" src="{{ asset('images/yellow-vector.png') }}" />
        </div>
    </div>
</x-landing-layout>
