<?php

class UserController extends BaseController
{
    /**
     * singup
     *
     */
    public function getSignup()
    {
        return View::make('sites.users.signup');
    }

    /**
     * Post signup Info
     *
     * @param  param_type  param_name
     * @return return type
     */
    public function postSignup()
    {
        $input = Input::except('year','month','day');
        $input['birthday'] = Input::get('year').'/'.Input::get('month').'/'.Input::get('day');

        $validate_rules = array(
            'email'                 => 'Required|Unique:users|Email',
            'password'              => 'Required|Min:6|Confirmed',
            'password_confirmation' => 'Required',
            'username'              => 'Required',
            'gender'                => 'Required',
            'birthday'              => 'date|date_format:Y/m/d|Required'
        );

        $validator = Validator::make($input, $validate_rules);

        if ($validator->fails()) {
            // The given data did not pass validation
            return Redirect::to('/user/signup')->with('error',$validator->messages());
        }

        // Let's register a user.
        $user = Sentry::register(array(
            'email'    => $input['email'],
            'password' => $input['password'],
        ));

        // Let's get the activation code
        $activationCode = $user->getActivationCode();

        UserInfo::create(array(
            'username' => $input['username'],
            'user_id'  => $user->id,
            'birthday' => Carbon::createFromFormat('Y/m/d',$input['birthday'])->toDateString(),
            'gender'   => UserInfo::getGenderConvert(Input::get('gender'))
            ));

        UserMailer::welcome($input['email'], $user->id, $activationCode);

    }

    public function getActivate($user_id, $activationCode)
    {

    }
}
