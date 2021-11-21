
{!! Form::select('country',__('Choose Country Name'))->option($faqgroup->preprend(__('Choose Country Name'), ''))->multiple() !!}
{!! Form::text('question', __('Faq Question'))->required() !!}
{!! Form::textarea('answer', __('Faq Answer'))->required() !!}


{!! Form::text('position', __('Sort Order')) !!}
{!! Form::checkbox('status',__('Enable'))->inline() !!}


