<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        /*
         * Colocado um delay apenas para exemplificar o show/hide do loading
         * */
        sleep(1);
    }
}
