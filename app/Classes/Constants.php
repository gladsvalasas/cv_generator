<?php


namespace App\Classes;


use Storage;

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

    const USER_API_PERMISSIONS = [
        "main:user",
        "main:moder",
        "main:admin",
        "main:superadmin"
    ];

    const LANDING_BASE_CONFIG = [
        "title" => "SAKHAROV | PORTFOLIO",
        "mainText" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit.",
        "subText" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam, atque corporis, in incidunt, libero minus nam officia quam quas quibusdam ratione sit soluta velit voluptates! Deserunt dicta ex ullam?",
    ];

    const LANDING_BASE_CONFIG_PATH = "config.json";

    const LANDING_MAX_COUNT_STACK = 10;
    const LANDING_MAX_COUNT_PROJECTS = 5;
}
