<h4 class="page-title">{{__('Company Meta')  }}</h4>
<div class="form-group">
    {!! Form::text('metadata.meta_title', __('Meta Title')) !!}
</div>
<div class="form-row">
    <div class="form-grou col-md-6">
        {!! Form::textarea('metadata.meta_description', __('Meta Description')) !!}
    </div>
    <div class="form-grou col-md-6">
        {!! Form::text('metadata.meta_keyword', __('Meta Keyword')) !!}
    </div>
</div>
<h4 class="page-title">{{__('Company Analytics')  }}</h4>
<div class="form-group">
    {!! Form::textarea('setting.google_analytics', __('Google Analytics Code')) !!}
</div>
<h4 class="page-title">{{__('Webmaster Verification')  }}</h4>
<div class="form-group">
    {!! Form::text('setting.google_identification', __('Google Identification Code')) !!}
</div>
<div class="form-group">
    {!! Form::text('setting.bing_identification', __('Bing Identification Code')) !!}
</div>
<div class="form-group">
    {!! Form::text('setting.yandex_identification', __('Yandex Identification Code')) !!}
</div>
<div class="form-group">
    {!! Form::text('setting.baidu_identification', __('Baidu Identification Code')) !!}
</div>
<div class="form-group">
    {!! Form::text('setting.alexa_identification', __('Alexa Identification Code')) !!}
</div>
<div class="form-group">
    {!! Form::text('setting.matomo_identification', __('Matomo Identification Code')) !!}
</div>
