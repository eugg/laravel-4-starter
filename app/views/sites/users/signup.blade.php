@extends('layouts.default')

{{-- Web site Title --}}
@section('custom_title')
{{trans('users.sign_up')}} -
@stop

{{-- Content --}}
@section('content')
<div class="col-md-4 col-md-offset-4">
      <h3>{{trans('users.quick_signup')}}</h3>
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
          <a href="#" class="btn btn-lg btn-primary btn-block">Facebook</a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <a href="#" class="btn btn-lg btn-danger btn-block">Google</a>
        </div>
      </div>
      <div class="login-or">
        <hr class="hr-or">
        <span class="span-or"> or </span>
      </div>
    <legend>{{trans('users.sign_up')}}</legend>
      <form role="form" method='POST' action='/user/signup' data-parsley-validate>
        <div class="form-group">
          <label for="inputUsername">{{trans('users.username')}}</label>
          <input type="text" class="form-control" id="inputEmail" name='username' data-parsley-required>
        </div>
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="text" class="form-control" id="inputUsername" name='email' data-parsley-trigger="focusout" data-parsley-type="email" data-parsley-required required>
        </div>
        <div class="form-group">
          <label for="inputPassword">{{trans('users.password')}}</label>
          <input type="password" class="form-control" id="inputPassword" name='password' data-parsley-trigger="focusout" data-parsley-minlength="6" required>
        </div>
        <div class="form-group">
          <label for="inputConfirmPassword">{{trans('users.confirm_password')}}</label>
          <input type="password" class="form-control" id="inputConfirmPassword" name='password_confirmation' parsley-trigger="focusout" data-parsley-equalto="#inputPassword" required>
        </div>

        <div class="form-group">
          <label for="inputGender">{{trans('users.gender')}}</label>
          <div>
            <label>
              <input type="radio" name="gender" id="male" value="male" data-parsley-required> {{trans('users.male')}}
              <input type="radio" name="gender" id="female" value="female" data-parsley-required> {{trans('users.female')}}
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="inputBirthday">{{trans('users.birthday')}}</label>
          <div class='row'>
            <div class="col-xs-3">
                <label>{{trans('users.month')}}</label>
                <select name='month' class="form-control" data-parsley-required>
                    <option value=''>{{trans('users.month')}}</option>
                    @for($i=1;$i<=12;$i++)
                        <option value='{{$i}}'>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-xs-3">
                <label>{{trans('users.day')}}</label>
                <select name='day' class="form-control" data-parsley-required>
                    <option value=''>{{trans('users.day')}}</option>
                    @for($i=1;$i<=31;$i++)
                        <option value='{{$i}}'>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-xs-4">
                <label>{{trans('users.year')}}</label>
                <select name='year' class="form-control" data-parsley-required>
                    <option value=''>{{trans('users.year')}}</option>
                    @for($i=Carbon::now()->year; $i >=1905 ; $i--)
                        <option value='{{$i}}'>{{ $i }}</option>
                    @endfor
                </select>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn btn-primary">
          {{trans('users.sign_up')}}
        </button>
      </form>
</div>
@stop

@section('scripts')
<script src="/assets/js/Parsley/dist/parsley.min.js"></script>

@stop

@section('custom_css')
<style>
  .login-or {
    position: relative;
    font-size: 18px;
    color: #aaa;
    margin-top: 10px;
            margin-bottom: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .span-or {
    display: block;
    position: absolute;
    left: 50%;
    top: -2px;
    margin-left: -25px;
    background-color: #fff;
    width: 50px;
    text-align: center;
  }
  .hr-or {
    background-color: #cdcdcd;
    height: 1px;
    margin-top: 0px !important;
    margin-bottom: 0px !important;
  }
</style>
@stop
