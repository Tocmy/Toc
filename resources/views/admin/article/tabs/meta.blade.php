{{ Form::fieldsetOpen(__('News Seo')) }}

{!! Form::text('$seo.title', __('News Seo Title')) !!}
{!! Form::textarea('$seo.description', __('News Seo Description'))->attrs(['col' =>'40', 'row'=>'10']) !!}
{!! Form::textarea('$seo.keyword', __('News Seo Keyword'))->attrs(['col' =>'40', 'row'=>'10']) !!}

{{ Form::fieldsetClose() }}


{{ Form::fieldsetOpen(__('Tag')) }}
{!! Form::text('$tag.name', __('News Tag') )  !!}

{{ Form::fieldsetClose() }}

