{{ Form::fieldsetOpen(__('Product Discount')) }}
<table class="table table-border nmt" id="discount">
    <thead>
        <tr>
            <th class="text-left">{{ __('Customer Group') }}</th>
            <th class="text-left">{{ __('Quantity') }}</th>
            <th class="text-left">{{ __('Priority') }}</th>
            <th class="text-left">{{ __('Price') }}</th>
            <th class="text-left">{{ __('Date Start') }}</th>
            <th class="text-lfet">{{ __('Date End') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="discount-row">

            <td class="text-left" data-title="{{ __('Attribute') }}">
                {!! Form::select('customergroups.name',__('Choose Attribute Class'))->option($customergroups->preprend(__('Choose Name'), ''))->multiple() !!}
            </td>
            <td class="text-left" data-title="{{ __('Text') }}">
               {!! Form::text('quantity', __('Quantity')) !!}
            </td>
            <td class="text-left" data-title="{{ __('Priority') }}">
                {!! Form::text('priority', __('Priority')) !!}
            </td>
            <td class="text-left" data-title="{{ __('Price') }}">
                {!! Form::text('price', __('Price')) !!}
            </td>
            <td class="text-left" data-title="{{ __('Date Start') }}">
                <div class="form-group form-ripple">
                    <label for="flatpickr-demo">Date</label>
                    <input class="form-control flatpickr" type="text" placeholder="Select Date.." id="flatpickr-date">
                 </div>

            </td>
            <td class="text-left" data-title="{{ __('Date End') }}">
                <div class="form-group form-ripple">
                    <label for="flatpickr-demo">Date</label>
                    <input class="form-control flatpickr" type="text" placeholder="Select Date.." id="flatpickr-date">
                </div>
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
