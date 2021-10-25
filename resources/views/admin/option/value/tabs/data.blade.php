<div class="form-group">
    {!! Form::label('name', @lang('Store'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    {!! Form::select(['name', $companies, null, 'class' => 'form-control', 'id'="name", 'multiple' => 'multiple' 'value'=>Input::old('name') ]) !!}
    </div>

</div><!---Store-->  
