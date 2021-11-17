{!! Form::label('position', __('Sort Order'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}
<div class="col-sm-4">
    {!! Form::text('position', ['class'=>'form-control', 'id' => 'position', 'placeholder'=>'', 'value'=>Input::old('position') ]) !!}
</div> <!--sort order-->
{!! Form::label('status', __('Status'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}
<div class="col-sm-4">
      {!! Form::select('status', ['{{__('Disable')}}','{{__('Enable')}}'], ['class' => 'form-control']) !!}
</div>
      </div><!-- sorting -->

 <div class="form-group required {!! $errors->has('title') ? 'has-error' : '' !!}">
   {!! Form::label('title', __('Information Title'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}
   <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
   {!! Form::text('title', ['class'=>'form-control',  'placeholder'=>'{{__('Information Title')}}', 'value'=>Input::old('title') ]) !!}
    @if($error->has('title'))<p class="help-block">{{ $error->first('title') }} </p> @endif
   </div>
  </div><!---info title-->
  <div class="form-group required {!! $errors->has('description') ? 'has-error' : '' !!}">
     {!! Form::label('description', __('Description'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}
       <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
     {!! Form::textarea('description', ['class'=>'form-control', 'id' => 'description', 'placeholder'=>'{{__('Description')}}',  'value'=>Input::old('description')]) !!}
     @if($error->has('description'))<p class="help-block">{{ $error->first('description') }} </p> @endif

            </div>
   </div><!---Description -->
  <div class="form-group">
            {!! Form::label('meta_title', __('Meta Title'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}

            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            {!! Form::text('meta_title', ['class'=>'form-control',  'placeholder'=>'{{__('Meta Title')}}', 'value'=>Input::old('meta_title') ]) !!}
            </div>

  </div><!---Meta title-->
  <div class="form-group">
            {!! Form::label('meta_description', __('Meta Description'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}

            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            {!! Form::textarea('meta_description', ['class'=>'form-control', 'id' => '{{__('meta_description')}}', 'placeholder'=>'Meta Description', 'cols' => '40', 'row'=> '5', 'value'=>Input::old('meta_description')]) !!}

            </div>
  </div><!---Meta desc-->
  <div class="form-group">
            {!! Form::label('meta_keyword',__('SEO Keyword'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}
             <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
             {!! Form::textarea('meta_keyword', ['class'=>'form-control', 'id' => 'keyword', 'placeholder'=>'{{__('Keyword')}}', 'cols' => '40', 'row'=> '5', 'value'=>Input::old('meta_keyword')]) !!}
            </div>

  </div><!---Meta keyword-->
