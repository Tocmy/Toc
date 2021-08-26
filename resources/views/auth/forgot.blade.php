<div
  class="modal fade"
  id="forgot"
  tabindex="-1"
  aria-labelledby="forgotModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotModalLabel">{{ __('Forgot Your Password?') }}</h5>
        <button type="button"  class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          {{ __('Enter the e-mail address associated with your account. Click submit to
          have your password e-mailed to you.') }}
        </p>
        {!! Form::open()->post()->route('auth.password.email') !!}

          <fieldset>
        {!! Form::text('email', __('Email Address'))->type('email')->required() !!}

          </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button"  data-dismiss="modal"  class="btn btn-default float-left">
          {{ __('Black') }}
        </button>
        {!! Form::submit('Password Reset Link')->attrs(['class'=>"btn btn-primary float-right"]) !!}

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
