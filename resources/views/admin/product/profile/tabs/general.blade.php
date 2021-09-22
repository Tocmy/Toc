{!! Form::text('name', __('Special Name'))->required() !!}

{!! Form::fieldsetOpen(__('This Special offer to All Customer or Exclusive Offer')) !!}


{!! Form::select('customergroup',__('Choose Customer Group <a data-toggle="popover" data-content="{{ __('If blank , offer for all customer') }}" />'))
               ->option($customergroups->preprend(__('Choose Customer Group Name'), ''))->multiple() !!}

{!! Form::fieldsetClose() !!}


{!! Form::fieldsetOpen(__('Special Offer Date')) !!}
<div class="form-row">
    <div class="col-sm-6">
        {!! Form::datetime('begin_at', __('Special Offer begin at')) !!}
    </div>
    <div class="col-sm-6">
        {!! Form::datetime('expire_at', __('Special Offer End At')) !!}
    </div>
</div>

{!! Form::fieldsetClose() !!}

{!! Form::checkbox('status',__('Enable'))->inline() !!}
