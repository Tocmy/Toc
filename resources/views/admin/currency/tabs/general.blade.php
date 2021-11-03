


{!! Form::text('title',__('Currency Title') )->required() !!}
{!! Form::text('code',__('Currency Code') )->required() !!}

{!! Form::text('symbol_left',__('Currency Symbol Left') )->required() !!}
{!! Form::text('symbol_right',__('Currency Symbol Right') )->required() !!}
{!! Form::text('decimal_place',__('Currency decimal placement') )->required() !!}
{!! Form::text('value',__('Currency value') )->required() !!}
{!! Form::checkbox('is_default', __('Set as base weight')) !!}
{!! Form::checkbox('status',__('Enable'))->inline() !!}



