<?php

class user 
{
    private $id;
    private $username;
    private $email;
    private $pass;
    private $roles;
    private $onlinestatus;
    private $avatar;
    private $emailverifystatus;
    private $logindate;
    private $moderationstatus;
    private $address;

    function get_id()
    {
        return $this->id;
    }

    function set_id($id)
    {
        $this->id = $id;
    }

    function get_username()
    {
        return $this->username;
    }

    function set_username($username)
    {
        $this->username = $username;
    }

    function get_email()
    {
        return $this->email;
    }

    function set_email($email)
    {
        $this->email = $email;
    }

    function get_pass()
    {
        return $this->pass;
    }

    function set_pass($pass)
    {
        $this->pass = $pass;
    }

    function get_roles()
    {
        return $this->roles;
    }

    function set_roles($roles)
    {
        $this->roles = $roles;
    }

    function get_onlinestatus()
    {
        return $this->onlinestatus;
    }

    function set_onlinestatus($onlinestatus)
    {
        $this->onlinestatus = $onlinestatus;
    }

    function get_avatar()
    {
        return $this->avatar;
    }

    function set_avatar($avatar)
    {
        $this->avatar = $avatar;
    }

    function get_emailverifystatus()
    {
        return $this->emailverifystatus;
    }

    function set_emailverifystatus($emailverifystatus)
    {
        $this->emailverifystatus = $emailverifystatus;
    }

    function get_logindate()
    {
        return $this->logindate;
    }

    function set_logindate($logindate)
    {
        $this->logindate = $logindate;
    }

    function get_moderationstatus()
    {
        return $this->moderationstatus;
    }

    function set_moderationstatus($moderationstatus)
    {
        $this->moderationstatus = $moderationstatus;
    }

    function get_address()
    {
        return $this->address;
    }

    function set_address($address)
    {
        $this->address = $address;
    }

}
?>