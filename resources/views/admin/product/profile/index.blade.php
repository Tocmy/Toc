@extends()
@section('title')

@endsection
@section('page-header')

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Special Product Management') }}</h3>
                <div class="card-tools">
                   <a href="{{ route('specials.create') }}" type="button" class="btn btn-circle btn-info" data-toggle="tooltip" title="{{ __('Add') }}" data-placement="top">
                    <i class="mdi mdi-folder-multiple-plus-outline"></i>
                   </a>
                   <a href="{{ route('dashboard.index') }}" type="button" class="btn btn-circle btn-success" data-toggle="tooltip" title="{{ __('Home') }}" data-placement="left">
                    <i class="mdi mdi-folder-move-outline"></i>
                   </a>
                </div>
            </div>
            <div class="card-body">
                {!! $dataTable->table(['width' => '100%']) !!}
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
{!! $dataTable->script() !!}
@endpush
