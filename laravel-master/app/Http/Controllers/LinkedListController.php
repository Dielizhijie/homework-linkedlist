<?php

namespace  App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class LinkedListController extends Controller{
    public function construct(){
        DB::table('linkedList')->delete();
//        DB::insert('insert into linkedList value(?, ?)', [1, 'Aaaa']);
//        DB::insert('insert into linkedList value(?, ?)', [2, 'Bbbb']);
//        $bool = DB::insert('insert into linkedList value(?, ?)', [3, 'Cccc']);
        $bool = DB::table('linkedList')->insert([
            ['id' => 1, 'name' => 'Aaaa'],
            ['id' => 2, 'name' => 'Bbbb'],
            ['id' => 3, 'name' => 'Cccc']
        ]);
        if($bool = true){
            echo "链表构造成功";
        }
    }
    public function insert(){
        return view('ListInsert');
    }

    public function in_insert(Request $node){
        $id = $node->input('id');
        $name = $node->input('newName');
        $max = DB::table('linkedList')->max('id');
        if($id < 0){
            echo "无法插入";
        }
        if($id > $max + 1){
            echo "无法插入";
        }
        else{
            if($id == $max + 1){
                $bool = DB::insert('insert into linkedList value(?,?)', [$id, $name]);
            }
            else{
                for($i = $max; $i >= $id; $i--){
                    DB::table('linkedList')->where('id', $i)
                        ->increment('id');
                }
                $bool = DB::table('linkedList')->insert(
                    ['id' => $id, 'name' => $name]
                );
            }
        }
        if($bool = true){
            echo "插入成功";
        }
    }

    public function delete(){
        return view('ListDelete');
    }

    public function in_delete(Request $newId)
    {
        $id = $newId->input('id');
        $max = DB::table('linkedList')->max('id');
        if ($id > $max) {
            echo "错误";
        }
        if ($id < 1) {
            echo "错误";
        }
        else{
        $num = DB::delete('delete from linkedList where id = ?', [$id]);
        DB::table('linkedList')
            ->where('id', '>', $id)
            ->decrement('id');
        echo "删除成功";
        }
    }


    public function push(){
        return view('ListPush');
    }

    public function in_push(Request $node){
        $max = DB::table('linkedList')->max('id');
        $name = $node->input('newName');
        $bool = DB::table('linkedList')->insert(
            ['id' => $max + 1, 'name' => $name]);
        if($bool = true){
            echo "成功将";
            echo"$name";
            echo "存入链表末端";
        }
    }

    public function pop(){
        $max = DB::table('linkedList')->max('id');
        $list = DB::table('linkedList')
            ->where('id', $max)
            ->get();
        $num = DB::delete('delete from linkedList where id = ?', [$max]);
            echo "成功将第$max";
            echo "行删除";
            dd($list);
    }

    public function size(){
        $size = DB::table('linkedList')->max('id');
        echo "链表的长度是$size";
    }

    public function print_list(){
        $list = DB::table('linkedList')
            ->select('id','name')
            ->get();
        dd($list);
    }
}