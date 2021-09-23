
<table class="table table-border nmt" id="history">
    <thead>
        <tr>
            <th class="text-left">{{ __('Banner Name') }}</th>
            <th class="text-lfet">{{ __('Show') }}</th>
            <th class="text-left">{{ __('Click') }}</th>
            <th class="text-left">{{ __('Date') }}</th>

        </tr>
    </thead>
    <tbody>
        <tr id="image-row">
            @foreach ($images as $image )
            <td class="text-left" data-title="{{ __('Banner Name') }}">{!! $image->image !!}</td>
            <td class="text-left" data-title="{{ __('Show') }}">{!! $image->link !!}</td>
            <td class="text-left" data-title="{{ __('Click') }}">{!! $image->title !!}</td>
            <td class="text-left" data-title="{{ __('Data') }}">{!! $image->description !!}</td>

            @endforeach

        </tr>
    </tbody>
    
</table>

