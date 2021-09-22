{{ Form::fieldsetOpen(__('Addition Product Image')) }}
<table class="table table-border nmt" id="image">
    <thead>
        <tr>
            <th class="text-left">{{ __('Image') }}</th>
            <th class="text-left">{{ __('Pallete Colour') }}</th>
            <th class="text-left">{{ __('Sort Order') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="image-row">

            <td class="text-left" data-title="{{ __('Image') }}">
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
            </td>
            <td class="text-left" data-title="{{ __('Pallete Colour') }}">
                {!! Form::select('colourpallet',__('Choose Colour'))->option($colour->preprend(__('Choose Name'), ''))->multiple() !!}
            </td>
            <td class="text-left" data-title="{{ __('Sort Order') }}">
                {!! Form::text('position', __('Sort Order')) !!}
            </td>

            <td class="text-left " data-title="{{ __('Action') }}"  >
              <a class="btn btn-danger" href="" onclick="$('row-id').remove();" data-toggle="tooltip" title="{{ __('remove') }}" >
                 <i class="mdi mdi-tray-remove"></i>
              </a>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td class="text-left" data-title="{{ __('Action') }}">
                <a class="btn btn-success" href="" onclick="$('row-id').add()" data-toggle="tooltip" title="{{ __('Add') }}">
                    <i class="mdi mdi-tray-plus"></i>
                </a>
            </td>
        </tr>
    </tfoot>
</table>



{{ Form::fieldsetClose() }}
