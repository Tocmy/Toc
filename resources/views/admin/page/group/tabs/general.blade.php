

{!! Form::select('parent',__('Choose Page Group Main'))->option($parents->preprend(__('Please Select'), ''))->multiple() !!}

{!! Form::text('title', __('Page Group Title'))->required() !!}
{!! Form::textarea('description', __('Page Group Description'))->attrs(['col'=>'10', 'row'=>'4'])->id('description')->required() !!}

{!! Form::text('position', __('Sort Order')) !!}
{!! Form::checkbox('status',__('Enable'))->inline() !!}
