{{ Form::fieldsetOpen(__('Product Attribute')) }}
<table class="table table-border nmt" id="attribute">
    <thead>
        <tr>
            <th class="text-left">{{ __('Attribute') }}</th>
            <th class="text-lfet">{{ __('Text') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="attribute-row">

            <td class="text-left" data-title="{{ __('Attribute') }}">
                {!! Form::select('attribute.name',__('Choose Attribute Class'))->option($attributes->preprend(__('Choose Name'), ''))->multiple() !!}
            </td>
            <td class="text-left" data-title="{{ __('Text') }}">
                {!! Form::textarea('attribute.text', __('Attribute Description'))->attrs(['col'=>'40', 'row'=>'10'])->id('description') !!}
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
            <td colspan="6"></td>
            <td class="text-left" data-title="{{ __('Action') }}">
                <a class="btn btn-success" href="" onclick="$('row-id').add()" data-toggle="tooltip" title="{{ __('Add') }}">
                    <i class="mdi mdi-tray-plus"></i>
                </a>
            </td>
        </tr>
    </tfoot>
</table>



{{ Form::fieldsetClose() }}
