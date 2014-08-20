@extends('layouts.default')

{{-- Web site Title --}}
@section('custom_title')
{{trans('users.login')}} -
@stop

{{-- Content --}}
@section('content')
<div class="col-md-4 col-md-offset-4">
      <h3>{{trans('users.login_or')}} <a href="/user/signup">{{trans('users.sign_up')}}</a></h3>
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

      <form role="form" method='POST' action='/login'>
        <div class="form-group">
          <label for="inputUsernameEmail">Email</label>
          <input type="text" class="form-control" id="inputUsernameEmail" name='email'>
        </div>
        <div class="form-group">
          <a class="pull-right" href="#">{{trans('users.forget_password')}}?</a>
          <label for="inputPassword">{{trans('users.password')}}</label>
          <input type="password" class="form-control" id="inputPassword" name='password'>
        </div>
        <div class="checkbox pull-right">
          <label>
            <input type="checkbox">
            {{trans('users.remember')}} </label>
        </div>
        <button type="submit" class="btn btn btn-primary">
          {{trans('users.login')}}
        </button>
      </form>
</div>
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
