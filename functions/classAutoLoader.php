<?php
/**
 * Created by PhpStorm.
 * User: Deniau
 * Date: 08/03/2018
 * Time: 12:34
 */

function classAutoLoader($className)
{
    include "./classes/" . $className . ".php";
}