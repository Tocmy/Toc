

 <!--attribute-->
<div class="form-group">
     {!! Form::select('attributegroup', __('Please Select Attribute Group')
          ->options($attributegroup->prepend('Please Select Attribute Group', ''))->multiple()) !!}
 </div>
<div class="form-group">
    {!! Form::text('name' , __('Name'))->required()  !!}
</div>
<div class="form-group">
    {!! Form::text('position', __('Position')) !!}
</div>
