<h4 class="page-title">{{__('Store')  }}</h4>
<div class="form-group">
   $companies = Company::all();

    {!!Form::select('company', 'Choice Store')->option($companies->prepend(__('Please Enter Your Category description')),'') !!}
</div>
<h4 class="page-title">{{__('Category Image')  }}</h4>
<div class="form-group">
    {!! Form::label('images', @lang('Image'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
<div class="store-card">
<img src="" class="img-responsive" alt="" />
</div>
<div class="text-center">
<!--filemanager link -->
<a onclick="img_upload('image,thumb');" class="btn btn-primary btn-line btn-xs ripple">
<i class="fa fa-search"></i>
</a>
<a onclick="$('#thumb').attr('src');$('#image').attr('value','');" class="btn btn-danger btn-line btn-xs ripple">
<i class="fa fa-eraser"></i>
</a>
</div>
</div>
</div>
