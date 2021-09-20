


{!! Form::text('title',__('Article Title') )->required() !!}
{!! Form::textarea('description',__('Description') )->attrs(['col'=>'10', 'row'=>'5'])->required() !!}

<div class="form-row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        {!! Form::datetime('published_at', __('Publish Article'))->id('date') !!}
    </div>


</div>

{!! Form::text('position', __('Position')) !!}
{!! Form::checkbox('status',__('Enable'))->inline() !!}




