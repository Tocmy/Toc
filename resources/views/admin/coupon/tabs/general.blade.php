{!! Form::text('name', __('Coupon Name'))->required() !!}
{!! Form::textarea('description', __('Coupon Description')) !!}
{!! Form::select('type', __('Choose Coupon Type <a data-toggle="popover" data-content="{{ __('Percentage or Fixed Amount') }}" />')) !!}
{!! Form::number('coupon_discount', __('Coupon Discount')) !!}
{!! Form::number('min_order' _('Minimun Order')) !!}
{!! Form::number('Total', __('Coupon Total <a data-toggle="popover" data-Content="{{ __('The total amount that must reach before the coupon is valid') }}" />')) !!}
{!! Form::checkbox('shipping', __('Free Shipping')) !!}
{!! Form::datetime('date_start', __('Data Start')) !!}
{!! Form::datetime('expire', __('Expire At')) !!}
{!! Form::text('uses_per_coupon',
      __('Uses Coupon per Customer<a data-toggle="{{ __('The Maximum number of times the coupon can be used by any customer') }}" />')) !!}

{!! Form::text('uses_customer',
      __('Uses Coupon per Customer<a data-toggle="{{ __('The Maximum number of times the coupon can be used by a single customer') }}" />')) !!}

{!! Form::checkbox('status',__('Enable'))->inline() !!}

{!! Form::fieldsetOpen(__('Only For Register Customer')) !!}
{!! Form::radio('logger', __('Yes')) !!}
{!! Form::fieldsetClose() !!}
