{!! Form::select('brand.name',__('Choose Brand Name'))->option($brands->preprend(__('Choose Name'), ''))->multiple() !!}
{!! Form::select('category.name',__('Choose Category'))->option($categories->preprend(__('Choose Name'), ''))->multiple() !!}
{!! Form::select('company.name',__('Choose Category'))->option($company->preprend(__('Choose Name'), ''))->multiple() !!}

<!--Dual box--->
<h4 class="headline2">{{__('Related Product')}}</h4>
<div class="form-group">
{!! Form::label('$related_id', @lang('Product Related'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
<select multiple="multiple" size="10" name="" class="form-control demo2" id="related">
</div>

</div>
