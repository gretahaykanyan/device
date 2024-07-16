<?php

namespace controller;

class Users
{
    public function __construct()
    {

        $_SESSION['email'] = $_SESSION['info'] = false;
        $user = new \model\User();

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {

            $user->signUp($_POST['username'], $_POST['email'], $_POST['password']);

        } elseif (isset($_POST['username']) && isset($_POST['password'])) {

            $user->signIn($_POST['username'], $_POST['password']);

        } elseif (isset($_POST['email'])) {

            $user->forgetPass($_POST['email']);

        } elseif (isset($_POST['code'])) {

            $user->resetCode($_POST['code']);
            
        } elseif (isset($_POST['cpassword']) && $_POST['cpassword']) {

            $user->changePass($_POST['password'], $_POST['cpassword']);
        }
    }
}
