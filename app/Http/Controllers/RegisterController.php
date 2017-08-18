<?php
/**
 * Created by PhpStorm.
 * User: fantang
 * Date: 2017/8/1
 * Time: 上午11:10
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
class RegisterController extends Controller {
    public function index() {
        return view('hello');
    }

    public function signIn() {
        if (empty($_REQUEST)) {
            return view('hello');
        }
    }

//    protected function store() {
//        print_r($_POST);
//    }
}