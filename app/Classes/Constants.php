<?php


namespace App\Classes;


class Constants
{
    /*PRIVILEGES ID*/
    const USER_PRIVILEGE = 1;
    const MODER_PRIVILEGE = 2;
    const ADMIN_PRIVILEGE = 3;
    const SUPERADMIN_PRIVILEGE = 4;

    /*Skills levels classes*/
    const SKILLS_LEVEL_CLASSES = [
        "",
        "is-link",
        "is-info",
        "is-warning",
        "is-primary"
    ];

    const COOKIE_TOKEN_NAME = "_APIBEARER";
}
