<?php
use Illuminate\Http\Request;

class TestController extends BaseController
{
    
    public function doSomething(Request $rq)
    {
        // Do something in here
        return 'hello';
    }
}