<?php


namespace App\Classes;


abstract class AbstractVerifyModel
{
    protected $verifyTypes;

    public function getVerify()
    {
        return $this->verifyTypes;
    }
}
