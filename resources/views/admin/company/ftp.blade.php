<h4 class="page-title">{{__('Ftp')  }}</h4>
<div class="form-group">
    {!! Form::text('setting.ftp_host', __('FTP Host')) !!}
</div>
<div class="form-group">
    {!! Form::text('setting.ftp_port', __('FTP Port')) !!}
</div>
<div class="form-group">
    {!! Form::text('setting.ftp_username', __('FTP Username')) !!}
</div>
<div class="form-group">
    {!! Form::text('setting.ftp_password', __('FTP Password')) !!}
</div>
<div class="form-group">
    {!! Form::text('setting.ftp_root', __('FTP Root')) !!}
</div>
<div class="form-group">
    {!! Form::radio('setting.ftp_status', __('FTP Status')) !!}

</div>
<!--Status enable Yes :Allow or Disable-->
