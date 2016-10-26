<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/20
 * Time: 11:34
 */

namespace App\Service;


use App\Contracts\TestContract;
use App\Http\Controllers\Controller;

class TestService implements TestContract
{

    public function cellMe($controllerName)
    {
        // TODO: Implement cellMe() method.
        dd("Cell Me Form TestServiceProvider IN " . $controllerName);
    }
}