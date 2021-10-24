
{!! Form::select('faqgroup',__('Choose Faq Group Name'))->option($faqgroup->preprend(__('Choose Faq Group Name'), ''))->multiple() !!}
{!! Form::text('question', __('Faq Question'))->required() !!}
{!! Form::textarea('answer', __('Faq Answer'))->required() !!}


{!! Form::text('position', __('Sort Order')) !!}
{!! Form::checkbox('status',__('Enable'))->inline() !!}


