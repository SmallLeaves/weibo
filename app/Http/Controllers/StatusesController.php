<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;
class StatusesController extends Controller
{
    public function __construct(){
        /*访问限制，只有登录的用户可以创建/删除微博*/
        $this->middleware('auth');
    }
    /*新建微博*/
    public function store(Request $request){
        $this->validate($request,[
            'content' => 'required|max:140'
        ]);
        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);
        session()->flash('success','发布成功！');
        return redirect()->back();
    }
    /*删除微博*/
    public function destroy(){

    }
}
