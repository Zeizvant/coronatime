@props(['confirmed', 'recovered', 'deaths', 'countries'])
<table class="md:w-full table-auto box-border md:relative absolute w-screen left-0 md:left-auto overflow-x-hidden">
    <x-table-header></x-table-header>
    <tbody class="text-xs md:text-sm font-normal" >
    <tr class="h-14">
        <td class="pl-2 md:pl-10">{{ __('landing.worldwide') }}</td>
        <td>{{ number_format($confirmed) }}</td>
        <td>{{ number_format($deaths) }}</td>
        <td>{{ number_format($recovered) }}</td>
    </tr>
    <template x-for="country in countries" >
        <tr x-show="show_item($el)" x-bind:data='country.country_name.name.ka + country.country_name.name.en' class="h-14">
            <td class="pl-2 md:pl-10" x-text="country.country_name.name[locale]"></td>
            <td x-text="country.confirmed.toLocaleString('en-US')"></td>
            <td x-text="country.deaths.toLocaleString('en-US')"></td>
            <td x-text="country.recovered.toLocaleString('en-US')"></td>
        </tr>
    </template>
    </tbody>
</table>
