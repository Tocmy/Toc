@extends('layouts.admin')
@section('title')

@endsection
@section('page-header')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div style="height: 600px;">
                <div id="fm"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
        document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

        fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
          window.opener.fmSetLink(fileUrl);
          window.close();
        });
      });
</script>

@endpush
