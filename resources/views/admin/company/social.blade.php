<h4 class="page-title">{{  __('Company Social account') }}</h4>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::UrlInput('facebook','Facebook')->placeholder(__('Facebook'))  !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::UrlInput('twitter','Twitter')->placeholder(__('Twitter'))  !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::UrlInput('google-plue','Facebook')->placeholder(__('Google Plus'))  !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::UrlInput('Skype','Skype')->placeholder(__('Skype'))  !!}
    </div>
</div>
<h4 class="page-title">{{__('Social Api') }}</h4>
<div class="form-group">
    {!! Form::textarea('facebook_api_id', 'Facebook Api Id') !!}
</div>
