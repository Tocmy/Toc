{!! Form::select('bannergroup',__('Choose Banner Group '))->option($bannergroups->preprend(__('Please Choose'), ''))->multiple() !!}
{!! Form::text('name',__('Banner Name'))->required() !!}
<div class="callout collout-info">
    <p>
        {{__('Set Width of Main Image Slideshow (input number value), for eg: 980 width x 380 height')}}
    </p>
</div>

<div class="form-row">
    <div class="col-lg-6 col-md-6 col-xs-6">
        {!! Form::text('min_width', __('Min Width of The Image'))->required() !!}
    </div>
    <div class="col-lg-6 col-md-6 col-xs-6">
        {!! Form::text('min_height', __('Min height of The Image'))->required() !!}

    </div>
</div>
<div class="form-row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        {!! Form::datetime('schedule', __('Schedule'))->id('date') !!}
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12">
        {!! Form::datetime('expire', __('Expire'))->id('date') !!}
    </div>

</div>
{!! Form::checkbox('status',__('Enable'))->inline() !!}
