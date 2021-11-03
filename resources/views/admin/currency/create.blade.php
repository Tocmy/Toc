@extends('admin.layouts.master')
@section('title')

@endsection
@section('page-header')

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">{{ __('Add Currency Class') }}</div>
                <div class="card-tools">
                    {!! Form::open()->post()->multipart()->route('currencies.store') !!}
                    {!! Form::button(['type' =>'submit', 'name' => 'save', 'class'=>'btn btn-circle btn-info ripple', 'data-toggle' =>'tooltip', 'title' => '{{__('Save')}}' ],
                    <i class="mdi mdi-content-save"></i>) !!}
                    {!! Form::button(['type' =>'submit', 'name' => 'cancel', 'class'=>'btn btn-circle btn-danger ripple', 'data-toggle' =>'tooltip',
                    'title' => '{{__('Cancel')}}' 'route' => 'currencies.index' ],<i class="mdi mdi-close-thick"></i>) !!}
                </div>
            </div>
            <div class="card-body">

                @include('admin.currency.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
