<?php

function controller_home() {
    return HTML::main_content('./partials/home.html', Session::$mode);
}
// Auth controllers
function controller_sendCode($data) {
    return Session::phone_code($data);
}

function controller_confirmCode($data){
    return Session::phone_confirm($data);
}
// User controllers
function controller_get_user_info($data) {
    return User::owner_info($data);
}

function controller_update_user($data) {
    return User::owner_update($data);
}
// Notify controllers
function controller_show_new_notify($data) {
    return Notification::getNotify($data);
}

function controller_read_all_notify($data) {
    return Notification::readAllNotify($data);
}