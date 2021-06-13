<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Default data properties
     */
    protected $data = [];

    /**
     * Default Data set
     */
    public function __construct()
    {   // Default variables
        $this->data = [
            'page_title' => 'Anujmane Ashrafia Bangladesh',
            'page_header' => 'Anujmane Ashrafia Bangladesh',
        ];
    }
}
