<?php namespace App\HTTP\HTML\Run;

use Scale\Http\HTTP\HTML\Controller;

class Index extends Controller
{

    public function index()
    {
        $this->renderView('hello');
    }
}
