{!! Form::select('pagegroup.name',__('Choose Page Group Name'))->option($pagegroups->preprend(__('Please Select'), ''))->multiple() !!}

{!! Form::text('title', __('Page Title'))->required() !!}
{!! Form::textarea('description', __('Page Description'))->attrs(['col'=>'10', 'row'=>'4'])->id('description')->required() !!}

{!! Form::text('position', __('Sort Order')) !!}
{!! Form::checkbox('status',__('Enable'))->inline() !!}
