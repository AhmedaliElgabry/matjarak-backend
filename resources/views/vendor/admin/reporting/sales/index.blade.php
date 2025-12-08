<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.reporting.sales.index.title')
    </x-slot>

    <div class="mb-5 flex items-center justify-between gap-4 max-sm:flex-wrap">
        <div class="flex gap-1.5">
            <p class="pt-1.5 text-xl font-bold leading-6 text-gray-800 dark:text-white">
                @lang('admin::app.reporting.sales.index.title')
            </p>
        </div>

        <v-reporting-filters>
            <div class="flex gap-1.5">
                <div class="shimmer h-[39px] w-[132px] rounded-md"></div>
                <div class="shimmer h-[39px] w-[140px] rounded-md"></div>
                <div class="shimmer h-[39px] w-[140px] rounded-md"></div>
            </div>
        </v-reporting-filters>
    </div>

    <div class="flex flex-1 flex-col gap-4 max-xl:flex-auto">
        @include('admin::reporting.sales.total-sales')

        <div class="flex flex-col justify-between gap-4 flex-1 [&>*]:flex-1 md:flex-row">
            @include('admin::reporting.sales.purchase-funnel')

            @include('admin::reporting.sales.abandoned-carts')
        </div>

        <div class="flex flex-col justify-between gap-4 flex-1 [&>*]:flex-1 md:flex-row">
            @include('admin::reporting.sales.total-orders')

            @include('admin::reporting.sales.average-order-value')
        </div>

        <div class="flex flex-col justify-between gap-4 flex-1 [&>*]:flex-1 md:flex-row">
            @include('admin::reporting.sales.tax-collected')

            @include('admin::reporting.sales.shipping-collected')
        </div>

        <div class="flex flex-col justify-between gap-4 flex-1 [&>*]:flex-1 md:flex-row">
            @include('admin::reporting.sales.total-refunds')

            @include('admin::reporting.sales.top-payment-methods')
        </div>
    </div>

    @pushOnce('scripts')
        <script type="module" src="{{ bagisto_asset('js/chart.js') }}"></script>

        <script type="text/x-template" id="v-reporting-filters-template">
            <div class="flex gap-1.5">
                <template v-if="isSuperAdmin">
                    <template v-if="channels.length > 1">
                        <x-admin::dropdown position="bottom-right">
                            <x-slot:toggle>
                                <button
                                    type="button"
                                    class="inline-flex w-full cursor-pointer appearance-none items-center justify-between gap-x-2 rounded-md border bg-white px-2.5 py-1.5 text-center text-sm leading-6 text-gray-600 transition-all marker:shadow hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                >
                                    @{{ channels.find(channel => channel.code == filters.channel)?.name }}
                                    <span class="icon-sort-down text-2xl"></span>
                                </button>
                            </x-slot>

                            <x-slot:menu class="!p-0 shadow-[0_5px_20px_rgba(0,0,0,0.15)] dark:border-gray-800">
                                <x-admin::dropdown.menu.item
                                    v-for="channel in channels"
                                    ::class="{'bg-gray-100 dark:bg-gray-950': channel.code == filters.channel}"
                                    @click="filters.channel = channel.code"
                                >
                                    @{{ channel.name }}
                                </x-admin::dropdown.menu.item>
                            </x-slot>
                        </x-admin::dropdown>
                    </template>
                </template>
                
                <template v-else>
                    <div class="inline-flex items-center gap-x-2 rounded-md border bg-gray-50 px-3 py-1.5 text-sm font-bold text-gray-600 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                        <span class="icon-store text-lg text-blue-600"></span>
                        @{{ sellerChannelName }}
                    </div>
                </template>
                <x-admin::flat-picker.date class="!w-[140px]" ::allow-input="false">
                    <input
                        class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400"
                        v-model="filters.start"
                        placeholder="@lang('admin::app.reporting.sales.index.start-date')"
                    />
                </x-admin::flat-picker.date>

                <x-admin::flat-picker.date class="!w-[140px]" ::allow-input="false">
                    <input
                        class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400"
                        v-model="filters.end"
                        placeholder="@lang('admin::app.reporting.sales.index.end-date')"
                    />
                </x-admin::flat-picker.date>
            </div>
        </script>

        <script type="module">
            app.component('v-reporting-filters', {
                template: '#v-reporting-filters-template',

                data() {
                    return {
                        // Pass PHP Permission Checks to Vue Data
                        isSuperAdmin: {{ auth()->guard('admin')->user()->isSuperAdmin() ? 'true' : 'false' }},
                        sellerChannelName: "{{ auth()->guard('admin')->user()->getChannelName() ?? 'My Store' }}",

                        channels: [
                            {
                                name: "@lang('admin::app.reporting.sales.index.all-channels')",
                                code: ''
                            },
                            ...@json(core()->getAllChannels()),
                        ],
                        
                        filters: {
                            // If Super Admin, default to empty (All Channels).
                            // If Seller, FORCE their specific channel code.
                            channel: "{{ auth()->guard('admin')->user()->isSuperAdmin() ? '' : (auth()->guard('admin')->user()->channel->code ?? '') }}",

                            start: "{{ $startDate->format('Y-m-d') }}",
                            
                            end: "{{ $endDate->format('Y-m-d') }}",
                        }
                    }
                },

                watch: {
                    filters: {
                        handler() {
                            this.$emitter.emit('reporting-filter-updated', this.filters);
                        },

                        deep: true
                    }
                },
            });
        </script>
    @endPushOnce
</x-admin::layouts>