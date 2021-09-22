{{ Form::fieldsetOpen(__('Product General Information')) }}
{!! Form::text('name', __('Product Name'))->required() !!}
{!! Form::text('model', __('Product Model'))->required() !!}
{!! Form::number('price', __('Product Price'))->required() !!}

{!! Form::textarea('summary', __('Product Short Description'))->attrs(['col'=>'40', 'row'=>'10']) !!}
{!! Form::textarea('description', __('Product Description'))->attrs(['col'=>'40', 'row'=>'10'])->id('description') !!}

{!! Form::text('position', __('Sort Order')) !!}
{!! Form::radio('status', __('Product Status'), [('0'=>{{ __('Disable') }}, '1'=>{{ __('Enable') }})]) !!}
{{ Form::fieldsetClose() }}
