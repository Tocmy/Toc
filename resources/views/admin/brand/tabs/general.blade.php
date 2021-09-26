{!! Form::text('name', __('Brand name'))->required() !!}
{!! Form::urlInput('url',__('Brand Website Address')) !!}
{!! Form::textarea('description',__('description'))->id('description') !!}
{!! Form::checkbox('status',__('Enable'))->inline() !!}
{!! Form::text('position',__('Sort Order')) !!}
