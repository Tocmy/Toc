@extends()
@section('title')
app_name(). '|' . {{ __('Faq Management') }}
@endsection
@section('page-header')

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Faq Management') }}</h3>
                <div class="card-tools">
                   <a href="{!! url()  !!}" type="button" class="btn btn-circle btn-info" data-toggle="tooltip" title="{{ __('Add') }}" data-placement="top">
                    <i class="mdi mdi-folder-multiple-plus-outline"></i>
                   </a>
                   <a href="{!!  !!}" type="button" class="btn btn-circle btn-success" data-toggle="tooltip" title="{{ __('Home') }}" data-placement="left">
                    <i class="mdi mdi-folder-move-outline"></i>
                   </a>
                </div>
            </div>
            <div class="card-body">
                <table id="Faq" class="table table-bordered">
                    <thead>
                       <tr>
				        <th class="text-left"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked',this.checked);" /></th>
                         <th >{{__('Faq Group Name ')}}</th>
                         <th >{{__('Question')}}</th>
                         <th >{{__('Answer')}}</th>
                          <th >{{__('Position')}}</th>
                         <th >{{__('Status')}}</th>
                         <th ></th>
                       </tr>
                     </thead>
                     <tbody>

                     </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
