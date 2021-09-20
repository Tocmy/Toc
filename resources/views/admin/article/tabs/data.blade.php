
{!! Form::select('company.name',__('Choose Store Name'))->option($companies->preprend(__('Choose Store Name'), ''))->multiple() !!}


{!! Form::fieldsetOpen(__('Product Image')) !!}
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
</div>
{!! Form::fieldsetClose() !!}

<table class="table table-border nmt" id="extra">
    <thead>
        <tr>
            <th class="text-left">{{ __('Addition Description') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="extra-row">

            <td class="text-left" data-title="{{ __('Addition Description') }}">

            {!! Form::textarea('extra_description', __('Addition Description'))->attrs(['col'=>'10', 'row'=>'5']) !!}
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
            <td colspan="6"></td>
            <td class="text-left" data-title="{{ __('Action') }}">
                <a class="btn btn-success" href="" onclick="$('row-id').add()" data-toggle="tooltip" title="{{ __('Add') }}">
                    <i class="mdi mdi-tray-plus"></i>
                </a>
            </td>
        </tr>
    </tfoot>
</table>

