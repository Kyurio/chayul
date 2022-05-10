<?php

class Session{

    
    public static function start(){
        session_start();
    }

    public static function Add($name, $value){
        $_SESSION[$name] = $value;
    }

    public static function User($name, $value){
        $_SESSION[$name] = $value;
    }

    public static function Returned($name){
        return $_SESSION[$name];
    }

    public static function out(){
        session_unset();
        session_destroy();
    }

}