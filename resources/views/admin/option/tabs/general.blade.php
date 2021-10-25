{!! Form::fieldsetOpen(__('Option')) !!}

{!! Form::text('name', __('Option Name'))->required() !!}
{!! Form::textarea('description', __('Option Description'))->attrs(['row' =>  '5', 'col' => '5'])->id('description') !!}
{!! Form::text('comment', __('Option Comment')) !!}

{!! Form::select('type',__('Choose Option Type '))->option($types->preprend(__('Please Select'), ''))->multiple() !!}

{!! Form::text('position',__('Sort Order')) !!}
{!! Form::fieldsetClose() !!}
