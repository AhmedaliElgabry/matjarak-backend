@php
    $currentUser = auth()->guard('admin')->user();
    $allChannels = core()->getAllChannels();

    // SaaS Logic: If not Super Admin, filter channels to only the User's Channel
    if (! $currentUser->isSuperAdmin() && $currentUser->channel) {
        $allChannels = $allChannels->where('id', $currentUser->channel->id);
    }
@endphp

@if (! $product->parent_id)
    {{-- If there is only 1 channel (SaaS case), hide the logic but ensure input exists --}}
    @if ($allChannels->count() == 1)
        <input type="hidden" name="channels[]" value="{{ $allChannels->first()->id }}">
        
        <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900 mb-4">
            <p class="mb-2 text-base font-semibold text-gray-800 dark:text-white">
                @lang('admin::app.catalog.products.edit.channels.title')
            </p>
            <div class="text-sm text-gray-600 dark:text-gray-300">
                <span class="label-active">
                    {{ $allChannels->first()->name }}
                </span>
            </div>
        </div>
    @else
        {!! view_render_event('bagisto.admin.catalog.product.edit.form.channels.before', ['product' => $product]) !!}

        <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
            <p class="mb-4 flex justify-between text-base font-semibold text-gray-800 dark:text-white">
                @lang('admin::app.catalog.products.edit.channels.title')
            </p>

            {!! view_render_event('bagisto.admin.catalog.product.edit.form.channels.controls.before', ['product' => $product]) !!}

            <div class="text-sm text-gray-600 dark:text-gray-300">
                @php $selectedChannelsId = old('channels') ?? $product->channels->pluck('id')->toArray() @endphp
                
                @foreach ($allChannels as $channel)
                    <x-admin::form.control-group class="!mb-2 flex items-center gap-2.5 last:!mb-0">
                        <x-admin::form.control-group.control
                            type="checkbox"
                            :id="'channels_' . $channel->id" 
                            name="channels[]"
                            rules="required"
                            :value="$channel->id"
                            :for="'channels_' . $channel->id" 
                            :label="trans('admin::app.catalog.products.edit.channels.title')"
                            :checked="in_array($channel->id, $selectedChannelsId)"
                        />

                        <label
                            class="cursor-pointer text-xs font-medium text-gray-600 dark:text-gray-300"
                            for="channels_{{ $channel->id }}"
                        >
                            {{ $channel->name }} 
                        </label>
                    </x-admin::form.control-group>
                @endforeach

                <x-admin::form.control-group.error control-name="channels[]" />
            </div>

            {!! view_render_event('bagisto.admin.catalog.product.edit.form.channels.controls.after', ['product' => $product]) !!}
        </div>

        {!! view_render_event('bagisto.admin.catalog.product.edit.form.channels.after', ['product' => $product]) !!}
    @endif
@endif