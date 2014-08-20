<?php

class LoginController extends BaseController
{
    /**
     * User login page
     *
     */
    public function getIndex()
    {
        return View::make('sites.users.login');
    }

    /**
     * Post user login action
     * @param string email
     *
     * @param string password
     *
     * @todo add user name to welcome message
     */
    public function postIndex()
    {
        $email    = trim(Input::get('email'));
        $password = trim(Input::get('password'));

        $rules = array(
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:6']
        );
        $validator = Validator::make(array('email'=>$email, 'password'=>$password), $rules);

        if ($validator->fails()) {
            return Redirect::to('/login')
                    ->withInput(Input::except('password'))
                    ->with('error', trans('messages.users.login_data_invalid'));
        } else {

            try {
                //Check for suspension or banned status
                $user = Sentry::getUserProvider()->findByLogin($email);
                $throttle = Sentry::getThrottleProvider()->findByUserId($user->id);
                $throttle->check();

                // Set login credentials
                $credentials = array(
                    'email'    => $email,
                    'password' => $password
                );
                // Try to authenticate the user,
                $user = Sentry::authenticate($credentials, Input::get('remember'));

            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                return Redirect::to('/login')
                    ->withInput(Input::except('password'))
                    ->with('error', trans('messages.users.wrong_email_or_password'));
            } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
                $time = $throttle->getSuspensionTime();

                return Redirect::to('/login')
                    ->withInput(Input::except('password'))
                    ->with('error', trans('messages.users.suspension_time', array('time'=>$time)));
            } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
                return Redirect::to('/login')
                    ->withInput(Input::except('password'))
                    ->with('error', trans('messages.users.user_baned'));
            }
            //Login was succesful.
            return Redirect::to('/')->with('success', trans('messages.users.welcome_back'));

        }
    }
}
