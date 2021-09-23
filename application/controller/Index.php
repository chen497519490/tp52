<?php
namespace app\controller;
use app\model\test;
use think\Controller;
use think\Db;
use \app\model\Test as TestModel;
use think\Request;

class Index extends Controller
{
    public function index()
    {
      $query = Db::table('test')->where('id',1)->find();
//        $query = Db::table('test')->paginate(3);
//        var_dump($query);
        $this->assign('test',$query);
        return $this->fetch('index');

    }
    public function getModelData(){
        $data = test::select();
//        return json($data);
    }
    public function insert(){
        $user = new \app\model\Test();
        $user->name = '测试';
        $user->tel = '测试';
        $user->address = '测试';
        $user->save();
    }
    public function delete(){
        $user = TestModel::destroy(3);
        return 1;
    }

    public function index2()
    {
        return view('index2');
    }
    public function add($name,$tel,$address)
    {
        $data = ['name' => $name, 'tel' => $tel, 'address' => $address,];
        $query = Db::table('test')->insert($data);
    }
    public function addnew(){
        $request = Request::instance();
        $a1 = $request->post('sel1');
        $a2 = input('sel2');
        $a = input('address');
        $data = [
            'name' =>$a1,
            'tel' =>$a2,
            'address' =>$a,
        ];
        $s = Db::table('test')->insert($data);
    }
    public function xh(){
        $list = TestModel::all();
        $this->assign('list',$list);
        return $this->fetch('xh');
    }
}
