<div class="form-group">
    {!!Form::text('name', 'name')->placeholder(__('Please Enter Your Category name'))->type('name')->required() !!}
</div>
<div class="form-group">
    {!!Form::textarea('description', 'Description')->placeholder(__('Please Enter Your Category description')) !!}
</div>
<div class="form-group">
    //$categories = Category::all();
    //$categories->prepend(__('Choice parent Category'),'');
    {!!Form::select('parent category', 'Chouse Parent Category')->option(__('Please Enter Your Category description')) !!}
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::text('position','Position')->placeholder(__('Sorting Order'))  !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::radio('status','Enable')->placeholder(__('Should Allow ?'))  !!}
    </div>
</div>
