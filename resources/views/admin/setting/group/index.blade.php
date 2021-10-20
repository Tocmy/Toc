@extends('admin.layouts.master')

@section('title')
 @lang('General Status')
@endsection

@section('page-header')


@endsection
@section('content')
 <div class="row">
     <div class="col-sm-12">
       <div class="card">
       <div class="card-header">
          <div class="card-title"> {{ __('General Status') }}</div>

                <div class="card-tools">

                    <a href="{{ route('statuses.create') }}  " type="button" class="btn btn-circle btn-info" data-toggle="tooltip" title="{{ __('Add') }}" data-placement="top">
                        <i class="mdi mdi-folder-multiple-plus-outline"></i>
                    </a>
                    <a href="{{ route('dashboards.index') }}" type="button" class="btn btn-circle btn-success" data-toggle="tooltip" title="{{ __('Home') }}" data-placement="left">
                        <i class="mdi mdi-folder-move-outline"></i>
                    </a>


               </div>

       </div><!--card-header-->
       <div class="card-body">
        {!! $dataTable->table(['width' => '100%']) !!}

       </div><!--card-body-->
       </div><!--card-pink-->

     </div><!--col-->
 </div><!--row-->
@endsection
@section('script')
{!! $dataTable->script() !!}
@endsection
