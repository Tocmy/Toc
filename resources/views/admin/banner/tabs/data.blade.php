<table class="table table-border nmt" id="extraimage">
    <thead>
        <tr>
            <th class="text-left">{{ __('Image') }}</th>
            <th class="text-lfet">{{ __('link') }}</th>
            <th class="text-left">{{ __('title') }}</th>
            <th class="text-left">{{ __('description') }}</th>
            <th class="text-left">{{ __('params') }}</th>
            <th class="text-left">{{ __('custom Code') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="image-row">
            @foreach ($images as $image )
            <td class="text-left" data-title="{{ __('Image') }}">{!! $image->image !!}</td>
            <td class="text-left" data-title="{{ __('link') }}">{!! $image->link !!}</td>
            <td class="text-left" data-title="{{ __('title') }}">{!! $image->title !!}</td>
            <td class="text-left" data-title="{{ __('description') }}">{!! $image->description !!}</td>
            <td class="text-left" data-title="{{ __('params') }}">{!! $image->param !!}</td>
            <td class="text-left" data-title="{{ __('Custom code') }}">{!! $image->custom_code !!}</td>
            @endforeach
            <td class="text-left " data-title="{{ __('Action') }}"  >
              <a class="btn btn-danger" href="" onclick="$('row-id').remove();" data-toggle="tooltip" title="{{ __('remove') }}" >
                 <i class="mdi mdi-tray-remove"></i>
              </a>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"></td>
            <td class="text-left" data-title="{{ __('Action') }}">
                <a class="btn btn-success" href="" onclick="$('row-id').add()" data-toggle="tooltip" title="{{ __('Add') }}">
                    <i class="mdi mdi-tray-plus"></i>
                </a>
            </td>
        </tr>
    </tfoot>
</table>
