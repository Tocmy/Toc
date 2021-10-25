{!! Form::fieldsetOpen(__('Option Value')) !!}

<table class="table table-border nmt" id="optionvalue">
    <thead>
        <tr>
            <th class="text-left">{{ __('Option Value Name') }}</th>
            <th class="text-lfet">{{ __('Image') }}</th>
            <th class="text-left">{{ __('Sort Order') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="optionvalue-row">
            @foreach ($optionvalues as $optionvalue )
            <td class="text-left" data-title="{{ __('Option Value Name') }}">{!! $optionvalue->option->name !!}</td>
            <td class="text-left" data-title="{{ __('Image') }}">{!! $optionvalue->option->Image !!}</td>
            <td class="text-left" data-title="{{ __('Sort Order') }}">{!! $optionvalue->position !!}</td>



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
            <td colspan="3"></td>
            <td class="text-left" data-title="{{ __('Action') }}">
                <a class="btn btn-success" href="" onclick="$('row-id').add()" data-toggle="tooltip" title="{{ __('Add') }}">
                    <i class="mdi mdi-tray-plus"></i>
                </a>
            </td>
        </tr>
    </tfoot>
</table>
{!! Form::fieldsetClose() !!}
