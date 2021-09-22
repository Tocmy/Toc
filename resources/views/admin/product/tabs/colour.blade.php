{{ Form::fieldsetOpen(__('Product Colour')) }}
{!! Form::select('colour.name',__('Choose Colour Palette'))->option($colours->preprend(__('Choose Name'), ''))->multiple() !!}

<table class="table table-border nmt" id="attribute">
    <thead>
        <tr>
            <th class="text-left">{{ __('Colour') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="attribute-row">

            <td class="text-left" data-title="{{ __('Colour') }}">
                {!! Form::select('colour.name',__('Choose Colour'))->option($colours->preprend(__('Choose Name'), ''))->multiple() !!}
            </td>



            <td class="text-left " data-title="{{ __('Action') }}"  >
              <a class="btn btn-danger" href="" onclick="$('row-id').remove();" data-toggle="tooltip" title="{{ __('remove') }}" >
                 <i class="mdi mdi-tray-remove"></i>
              </a>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="1"></td>
            <td class="text-left" data-title="{{ __('Action') }}">
                <a class="btn btn-success" href="" onclick="$('row-id').add()" data-toggle="tooltip" title="{{ __('Add') }}">
                    <i class="mdi mdi-tray-plus"></i>
                </a>
            </td>
        </tr>
    </tfoot>
</table>
{{ Form::fieldsetClose() }}
