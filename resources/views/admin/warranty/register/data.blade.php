{!! Form::select('company.name',__('Choose Store Name'))->option($companies->preprend(__('Choose Store Name'), ''))->multiple() !!}

{!! Form::fieldsetOpen(__('Seo Field')) !!}
{!! Form::text('seo.title', __('Seo Title')) !!}
{!! Form::textarea('seo.description', __('Seo Description') )->attrs(['cols' => '40', 'row'=> '5'])->id('description') !!}
{!! Form::textarea('seo.keyword', __('Seo Keyword') )->attrs(['cols' => '40', 'row'=> '5'])->id('keyword') !!}
{!! Form::fieldsetClose() !!}
