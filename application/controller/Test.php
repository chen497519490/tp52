<?php
namespace app\controller;
use \app\model\Test as TestModel;
class Test {
    public function index(){
        $result = TestModel::select();
        return json($result);
    }
}