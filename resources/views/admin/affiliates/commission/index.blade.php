@extends('admin.layouts.master')

@section('title')
 @lang('Affiliate Management')
@endsection

@section('page-header')
<h1>@lang('Affiliate Management')</h1>

@endsection
@section('content')
 <div class="row">
     <div class="col-sm-12">
       <div class="card">
       <div class="card-header">
          <div class="card-title"> @lang('Affiliate Management')</div>
          @role('Admin')
                <div class="pull-right card-tools">
                @permission('all')
                <button href="{!! url('admin.affiliate.create')  !!}" type="button" class="btn btn-circle btn-info" data-toggle="tooltip" title="{{trans('Add')}}" data-placement="left" >
			        	<span><i class="fa fa-plus"></i></span>
			        	</button>
                <button href="{!! url('admin.affiliate.destroy')  !!}" type="button" class="btn btn-circle btn-pink" ><span><i class="fa fa-trash"></i></span></button>

                @endpermission
               </div>
          @endrole
       </div><!--card-header-->
       <div class="card-body">
             <table id="Affiliate " class="table table-bordered">
                    <thead>
                       <tr>
				        <th class="text-left"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked',this.checked);" /></th>
                         <th >{{__('Name')}}</th>
                         <th >{{__('Email')}}</th>
                         <th >{{__('Status')}}</th>
                         <th >{{__('Approved')}}</th>
                         <th >{{__('created_at')}}</th>
                         <th ></th>
                       </tr>
                     </thead>
                     <tbody>

                     </tbody>
            </table>


       </div><!--card-body-->
       </div><!--card-pink-->

     </div><!--col-->
 </div><!--row-->
@endsection
@section('script')
<script type="text/javascript">
$(function(){
    $('#Affiliate ').DataTable({
    processing: true,
    serviceSide:true,
    language: {
    paginate: {
      next: '<i class="fa fa-chevron-right">',
      previous: '<i class="fa fa-chevron-left">'
    }
  },
    ajax:'{!! route('admin.affiliate.data') !!}',
    columns:[
	   {data: 'checkbox',     name: 'checkcard' },
	   {data: 'name',     name: 'name' },
	   {data: 'email', name:'email'},
	   {data: 'status', name:'satust'},
     {data: 'approved',   name:'approved'},
     {data: 'created_at',   name:'created_at'},
	   {data: 'action',   name:'action', orderable:false, searchable:false},
    ]

    });
});
</script>
@endsection
