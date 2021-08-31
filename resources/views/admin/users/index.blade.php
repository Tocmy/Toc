@extends('layouts.admin')

@section('title')
{{ __('User Management') }}
@endsection
@section('page-header')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{ __('User Management') }}
                    </div>
                    <div class="card-tool">
                        <a href="{{ route('admin.user.create') }}" type="button" class="btn btn-circle btn-info" data-toggle="tooltip" title="{{ __('Add') }}" data-placement="top">
                            <i class="mdi mdi-folder-multiple-plus-outline"></i>
                        </a>
                        <a href="{{ route('dashboard.index')  }}" type="button" class="btn btn-circle btn-success" data-toggle="tooltip" title=" __('Home')  }}" data-placement="left">
                            <i class="mdi mdi-folder-move-outline"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
{!! $dataTable->script() !!}
@endpush
