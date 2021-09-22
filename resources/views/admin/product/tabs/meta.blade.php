{{ Form::fieldsetOpen(__('Product Seo')) }}

{!! Form::text('$seo.title', __('Product Seo Title')) !!}
{!! Form::textarea('$seo.description', __('Product Seo Description'))->attrs(['col' =>'40', 'row'=>'10']) !!}
{!! Form::textarea('$seo.keyword', __('Product Seo Keyword'))->attrs(['col' =>'40', 'row'=>'10']) !!}

{{ Form::fieldsetClose() }}


{{ Form::fieldsetOpen(__('Product Tag')) }}
{!! Form::text('$tag.name', __('Product Tag') )  !!}

{{ Form::fieldsetClose() }}

