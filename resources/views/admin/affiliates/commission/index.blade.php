@extends('layouts.admin')

@section('title')
app_name(). '|' . {{ __($pageTitle) }}
@endsection

@section('page-header')


@endsection
@section('content')
 <div class="row">
     <div class="col-sm-12">
       <div class="card">
       <div class="card-header">
          <div class="card-title"> {{ __($pageTitle) }}</div>
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
