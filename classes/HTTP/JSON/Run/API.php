<?php namespace App\HTTP\JSON\Run;

use Scale\Http\HTTP\JSON\Controller;

class API extends Controller
{
    public function index()
    {
        $this->body(['hello' => 'world']);
    }
}
