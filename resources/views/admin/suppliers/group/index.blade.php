@extends('layouts.admin')
@section('title')
app_name(). '|' . {{ __($pageTitle) }}
@endsection
@section('page-header')

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __($pageTitle) }}</h3>
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
                {!! $dataTable->table(['width' =>'100%']) !!}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
{!! $dataTable->script() !!}
@endpush
