{!! Form::select('article_related_method',__('Choose Related Article'))->option($articlerelateds->preprend(__('Please Select'), ''))->multiple() !!}

<table class="table table-border nmt" id="related">
    <thead>
        <tr>
            <th class="text-left">{{ __('Article') }}</th>
            <th class="text-left">{{ __('Sort Order') }}</th>
            <th class="text-left">{{ __('Status') }}</th>
            <th class="text-left">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr id="related-row">

            <td class="text-left" data-title="{{ __('Article') }}">
                {!! Form::select('article_related_id',__('Choose Related Article'))->option($articles->preprend(__('Please Select'), ''))->multiple() !!}

            </td>
            <td class="text-left" data-title="{{ __('Sort Order') }}">
                {!! Form::text('position', __('Sort Order')) !!}

            </td>
            <td class="text-left" data-title="{{ __('Status') }}">
                {!! Form::checkbox('status', __('Status'), [('0'=>{{ __('Disable')}}, '1' =>{{ __('Enable') }} )]) !!}

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

