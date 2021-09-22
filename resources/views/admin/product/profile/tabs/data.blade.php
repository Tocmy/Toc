<table class="table table-border nmt" id="special">
    <thead>
        <tr>
            <th class="text-left">{{ __('Product Name') }}</th>
            <th class="text-lfet">{{ __('Product Price') }}</th>
            <th class="text-left">{{ __('Special Price') }}</th>
            <th class="text-left">{{ __('New Price') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="special-row">
            @foreach ($specials as $special )
            <td class="text-left" data-title="{{ __('Product Name') }}">{!! $special->product->name !!}</td>
            <td class="text-left" data-title="{{ __('Product Price') }}">{!! $special->product->price !!}</td>
            <td class="text-left" data-title="{{ __('Special Price') }}">{!! $special->price !!}</td>
            <td class="text-left" data-title="{{ __('Point Entitle') }}">{!! $special->point !!}</td>


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
            <td colspan="4"></td>
            <td class="text-left" data-title="{{ __('Action') }}">
                <a class="btn btn-success" href="" onclick="$('row-id').add()" data-toggle="tooltip" title="{{ __('Add') }}">
                    <i class="mdi mdi-tray-plus"></i>
                </a>
            </td>
        </tr>
    </tfoot>
</table>
