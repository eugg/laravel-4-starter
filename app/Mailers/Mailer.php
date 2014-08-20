<?php namespace Mailers;

class mailer
{
    public function sendTo($email, $subject, $view, $data = array())
    {
        Mail::queue($view, $data, function ($message) use ($email, $subject) {
            $message->to($email)
                    ->subject($subject);
        });
    }
}
