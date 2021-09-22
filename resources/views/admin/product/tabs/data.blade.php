{{ Form::fieldsetOpen(__('Product Main Image')) }}
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="image_label">Image</label>
        <div class="input-group">
            <input type="text" id="image_label" class="form-control" name="image"
                   aria-label="Image" aria-describedby="button-image">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
            </div>
        </div>
    </div>
</div><!--image-->


{{ Form::fieldsetClose() }}

{{ Form::fieldsetOpen(__('Product Details')) }}
{!! Form::number('cost', __('Product Cost')) !!}
{!! Form::number('msrp', __('Product Retail Price')) !!}

{{ Form::fieldsetClose() }}

{{ Form::fieldsetOpen(__('Taxation')) }}
{!! Form::select('tax.name',__('Choose Tax Name'))->option($taxes->preprend(__('Choose Name'), ''))->multiple() !!}


{{ Form::fieldsetClose() }}

{{ Form::fieldsetOpen(__('Product Availability')) }}
{!! Form::label('date_available', @lang('Date Available'), ['class' => 'col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label']) !!}
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
<div class="input-group date" id="dt1">
{!! Form::text('date_available', ['class'=>'form-control',  'placeholder'=>'{{__('Date Available')}}', 'value'=>Input::old('date_available') ]) !!}
 <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
</div>
</div>

</div>


{{ Form::fieldsetClose() }}

{!! Form::number('quantity', __('Product Quantity'))->required() !!}
{!! Form::number('minimun', __('Product Min Quantity'))->required() !!}
{!! Form::checkbox('subtract', __('Substract Stock') [('0'=>{{ __('No') }}, '1'=>{{ __('Yes') }})]) !!}

{!! Form::select('status.name',__('Choose Product Status'))->option($status->preprend(__('Choose Name'), ''))->multiple() !!}
{!! Form::checkbox('shipping', __('Shipping') [('0'=>{{ __('No') }}, '1'=>{{ __('Yes') }})]) !!}

{!! Form::select('location.name',__('Choose Product Location'))->option($locations->preprend(__('Choose Name'), ''))->multiple() !!}
{!! Form::checkbox('quote', __('Request a quote') [('0'=>{{ __('No') }}, '1'=>{{ __('Yes') }})]) !!}
{!! Form::text('age_minimun', __('Age Min Allow To Purchase')) !!}

{{ Form::fieldsetOpen(__('Product SKU')) }}
{!! Form::text('sku', __('Sku')) !!}
{!! Form::text('upc', __('Upc')) !!}
{!! Form::text('ean', __('Ean')) !!}
{!! Form::text('jan', __('Jan')) !!}
{!! Form::text('isbn', __('Isbn')) !!}
{!! Form::text('mpn', __('Mpn')) !!}

{{ Form::fieldsetClose() }}

{{ Form::fieldsetOpen(__('Measurement')) }}
{!! Form::text('length', __('Length')) !!}
{!! Form::text('height', __('Height')) !!}
{!! Form::text('width', __('Width')) !!}
{!! Form::select('length.name',__('Choose Length  Class'))->option($lengths->preprend(__('Choose Name'), ''))->multiple() !!}

{!! Form::text('weight', __('Weight')) !!}
{!! Form::select('weight.name',__('Choose Weight Class'))->option($weights->preprend(__('Choose Name'), ''))->multiple() !!}

{{ Form::fieldsetClose() }}
