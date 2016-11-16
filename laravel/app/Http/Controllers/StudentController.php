<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/11
 * Time: 17:09
 */

namespace App\Http\Controllers;


use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller {

    /**
     * 学生列表页
     */
    public function index() {
        $students = Student::paginate(10);
        return view('student.index', [
            'students' => $students]);
    }

    public function create(Request $request) {
        if ($request->isMethod('POST')) {
            //1.控制器验证
            //            $this->validate($request, [
            //                'Student.name' => 'required|min:2|max:20',
            //                'Student.age' => 'required|integer',
            //                'Student.sex' => 'required|integer',
            //            ],[
            //                'required'=>':attribute 为必填项',
            //                'min'=>':attribute 长度不符合要求',
            //                'integer'=>':attribute 必须为整型',
            //            ],[
            //                'Student.name'=>'姓名',
            //                'Student.age'=>'年龄',
            //                'Student.sex'=>'性别',
            //            ]);
            //2.Validator类验证
            $validator = \Validator::make($request->input(), [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整型',
            ], [
                'Student.name' => '姓名',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $data = $request->input('Student');
            if (Student::create($data)) {
                return redirect('student/index')->with('success', '添加成功!');
            } else {
                return redirect()->back();
            }
        }
        return view('student.create');
    }

    /**
     * 保存添加
     * @param Request $request
     * @return
     */
    public function save(Request $request) {
        $data = $request->input('Student');

        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];
        if ($student->save()) {
            return redirect('student/index');
        } else {
            return redirect()->back();
        }
    }

    public function test() {
        //       $students= DB::select('select * from student WHERE id>?',[1001]);
        //       dd($students);
        //        $bool=DB::insert('insert into student(name,age) VALUES (?,?)',['zhaomin',12]);
        //        var_dump($bool);
        //        $num=DB::update('update student set age =? WHERE name=?',['99','zhaomin']);
        //        var_dump($num);
        $num = DB::delete('delete from student WHERE age=?', [99]);
        dd($num);

    }

    public function query1() {
        //       $bool= DB::table('student')->insert(
        //            ['name' => 'imooc', 'age' => 18]
        //        );
        //        dd($bool);

        //       $id= DB::table('student')->insertGetId(
        //            ['name'=>'sean','age'=>'18']
        //        );
        //       var_dump($id);

        //一次插入多条数据
        $bool = DB::table('student')->insert([
            ['name' => 'fix-name1', 'age' => '20'],
            ['name' => 'fix-name2', 'age' => '21']
        ]);
        var_dump($bool);
    }

    /**
     *使用查询构造器更新数据
     */
    public function query2() {
        //        $num=DB::table('student')
        //            ->where('id',1010)
        //            ->update(['age'=>'30']);
        //        var_dump($num);

        //        $num=DB::table('student')->increment('age');
        //        $num=DB::table('student')
        //            ->where('id',1010)
        //            ->decrement('age',3,['name'=>'hhahhah']);
        //        var_dump($num);

    }

    /**
     *使用查询构造器删除数据
     */
    public function query3() {
        $num = DB::table('student')
            ->where('id', ">=", 1010)
            ->delete();

        var_dump($num);
        //删除数据表!!!谨慎使用
        //         DB::table('student')->truncate();
    }

    public function query4() {
        //        $bool=DB::table("student")->insert([
        //            ['id'=>1001,'name'=>'name1','age'=>18],
        //            ['id'=>1002,'name'=>'name2','age'=>19],
        //            ['id'=>1003,'name'=>'name3','age'=>20]
        //        ]);
        //        var_dump($bool);
        //        $result=DB::table('student')->get();
        //        dd($result);

        echo '<pre>';
        DB::table('student')->chunk(2, function ($student) {
            var_dump($student);

        });
    }

    public function request1(Request $request) {
        //        取值
        //        echo $request->input("name");
        //        echo $request->input("sex","未知");
        /* if ($request->has('name')) {
             echo $request->input('name');
         } else {
             echo '没有参数';
         }*/
        //        $result=$request->all();
        //        dd($result);

        //        2.判断请求类型
        //      echo  $request->method();
        //        if ($request->isMethod('POST')) {
        //            echo 'YES';
        //        }else{
        //            echo 'NO';
        //        }
        //        $res=$request->ajax();
        //        var_dump($res);

        echo $request->url();
    }

    public function session1(Request $request) {
        //        $request->session()->put('key1','value');
        //        session()->put('key2','value2');
        //存储数据到session
        //        Session::put('key3','value3');
        //        echo Session::get('key4','default');

        //以数组形式保存数据
        //        Session::put(['key5'=>'value5']);
        //把数据放到session的数组中
        //        Session::push('student','sean');
        //        Session::push('student','imooc');
        //        //取出数据并且删除
        //        $res=Session::pull('student','default');
        //        //取出所有直
        //        $res=Session::all();
        //        //判断session中某个key是否存在
        //        if (Session::has('key1')) {
        //
        //        }
        //        //删除key
        //        Session::forget('key1');
        //        //删除所有的session
        //        Session::flush();
        //暂存数据，只能用一次,get一次后就失效了
        //        Session::flash('key-flash','val-flash');


    }

    public function session2(Request $request) {
        //        echo $request->session()->get('key1');
        //        echo session()->get('key2');
        //        echo Session::get('key-flash');
        return Session::get('msg', '暂无信息');

    }

    public function response() {
        //        响应json
        /*$data = [
            'errCode' => 0,
            'errMsg' => 'success',
            'data' => 'sean'
        ];
        return response()->json($data);*/
        //重定向
        //        return redirect('session2');

        //重定向 并且携带数据
        //        return redirect('session2')->with('msg','快闪数据');

        //        return redirect()->action('StudentController@session2')->with('msg','快闪数据');

        //            return redirect()->route('session')->with('msg','快闪数据');

        return redirect()->back();


    }

    /**
     * 活动宣传页面
     */
    public function activity0() {
        return '活动快要开始了,敬请期待';
    }

    /**
     *
     */
    public function activity1() {
        return '互动进行中，谢谢参与1';
    }

    /**
     *
     */
    public function activity2() {
        return '互动进行中，谢谢参与2';
    }
}