<?php
/**
 * Created by PhpStorm.
 * User: fantang
 * Date: 2017/8/23
 * Time: 下午4:55
 */

use App\Http\Controllers\Controller;

class IndexController extends Controller {
    public function index () {
        return view('index');
    }
}