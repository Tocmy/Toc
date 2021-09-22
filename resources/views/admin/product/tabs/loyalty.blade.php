{{ Form::fieldsetOpen(__('Loyalty Point')) }}
{!! Form::text('loyalty', __('Point')) !!}
<div class="callout callout-info">
    <h4> Point  </h4>
    <p>
        @lang('Number of points needed to buy this item. If you dont want this product to be purchased with points leave as 0.')
    </p>
</div>
<table class="table table-border nmt" id="attribute">
    <thead>
        <tr>
            <th class="text-left">{{ __('Customer Group') }}</th>
            <th class="text-lfet">{{ __('Point') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="attribute-row">

            <td class="text-left" data-title="{{ __('Customer Group') }}">
                {!! Form::select('customergroup',__('Choose customer group'))->option($customergroups->preprend(__('Choose Name'), ''))->multiple() !!}
            </td>
            <td class="text-left" data-title="{{ __('Points') }}">
                {!! Form::number('loyalty.point', __('Please Enter Point')) !!}
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
