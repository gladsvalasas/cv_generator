<?php


namespace App\Classes;


class UsersUtilities
{
    static function checkPrivilegesForToken($user)
    {
        $privileges = ["main:user"];

        if ($user->permission_id === Constants::MODER_PRIVILEGE) $privileges[] = "main:moder";
        if ($user->permission_id === Constants::ADMIN_PRIVILEGE) {
            $privileges[] = "main:moder"; //refactor this pls
            $privileges[] = "main:admin";
        }
        if ($user->permission_id === Constants::SUPERADMIN_PRIVILEGE) {
            $privileges[] = "main:moder";
            $privileges[] = "main:admin";
            $privileges[] = "main:superadmin";
        }

        return $privileges;
    }
}
