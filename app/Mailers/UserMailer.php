<?php

class UserMailer extends Mailer
{
    /**
     * Send a welcome email to a new user.
     * @param  string $email
     * @param  int    $user_id
     * @param  string $activationCode
     * @return bool
     */
    public static function welcome($email, $user_id, $activationCode)
    {
        $subject = 'Welcome to Laravel4 ';
        $view = 'emails.auth.welcome';
        $data['user_id'] = $user_id;
        $data['activationCode'] = $activationCode;
        $data['email'] = $email;

        return Self::sendTo($email, $subject, $view, $data );
    }

}
