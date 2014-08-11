<?php

class UserController extends BaseController {

    public function getIndex()
    {
        echo asset('bootstrap/css/bootstrap.min.css');
        return View::make('hello');
    }

}
