@props(['confirmed', 'recovered', 'deaths', 'countries'])
<table class="md:w-full table-auto box-border md:relative absolute w-screen left-0 md:left-auto">
    <x-table-header></x-table-header>
    <tbody class="text-xs md:text-sm font-normal" >
    <tr class="h-14">
        <td class="pl-2 md:pl-10">{{ __('landing.worldwide') }}</td>
        <td>{{ number_format($confirmed) }}</td>
        <td>{{ number_format($deaths) }}</td>
        <td>{{ number_format($recovered) }}</td>
    </tr>
{{--    @foreach($countries as $country)--}}
{{--        <tr class="h-14">--}}
{{--            <td class="pl-2 md:pl-10">{{ $country->countryName->name }}</td>--}}
{{--            <td>{{ number_format($country->confirmed) }}</td>--}}
{{--            <td>{{ number_format($country->deaths) }}</td>--}}
{{--            <td>{{ number_format($country->recovered) }}</td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
    <template x-for="country in countries" >
        <tr x-show="show_item($el)" x-bind:data='country.country_name.name.ka + country.country_name.name.en' class="h-14">
            <td class="pl-2 md:pl-10" x-text="country.country_name.name[locale]"></td>
            <td x-text="country.confirmed"></td>
            <td x-text="country.deaths"></td>
            <td x-text="country.recovered"></td>
        </tr>
    </template>
    </tbody>


</table>
