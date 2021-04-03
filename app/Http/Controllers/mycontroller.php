<?php

namespace App\Http\Controllers;
use  Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\order;

class mycontroller extends Controller
{
    //

    public function order(){
        $pizza = DB::table('pizzas')->get();
        $sup = DB::table('suppliers')->get();

        return view('Order',compact('pizza','sup'));
    }

    public function sendOrder(Request $req){
$req->validate([
    'name'=>'required',
    'phone'=>'required',
    'sup'=>'required',
    'date'=>'required',
    'type'=>'required',
    'size'=>'required',
    'qty'=>'required',
]);
        $order = new order;

        $order->cname = $req->name;
        $order->cphone = $req->phone;
        $order->supid = $req->sup;
        $order->ddate = $req->date;
        $order->ptype = $req->type;
        $order->psize = $req->size;
        $order->qty = $req->qty;

        $unit = DB::table('pizzas')->where('type',$req->type)->where('size',$req->size)->value('price');
        $order->bill = $unit * $req->qty; 
        $order->save();

        return redirect('/')->with('msg','Order recieved');
    }

    public function login(Request $req){

        $req->validate([
            'uname'=>'required',
            'pw'=>'required'
        ]);
        $user = DB::table('admins')->where('username',$req->uname)->first();
        if($user){
            if(Hash::check($req->pw, $user->password)){
              
                return redirect('/admin')->with('msg','Succesfully Login');

            }else {
                return redirect()->back()->with('msg','Password is wrong');
            }
        }else{
             return redirect()->back()->with('msg','Does not exist user');
        }
    }

    public function issueord($id){
        DB::table('orders')->where('id',$id)->update([
            'status'=>"Delivered"
        ]);
        return redirect('/admin')->with('msg','Order Sent');
    }
    public function deleteord($id){
        DB::table('orders')->where('id',$id)->delete();
        return redirect('/admin')->with('msg','Order is deleted');
    }

    public function admin(){
        $order = DB::table('orders')->where('status','New Order')
                ->orderBy('ddate','asc')
                ->get();
                

                return view('admin',compact('order'));

    }

    public function reven(Request $req){
        $income = DB::table('orders')->select('ptype','psize',DB::raw('SUM(bill) as sum'))->groupBy('ptype')->groupBy('psize')->where('ddate',$req->date)->where('status','Delivered')->get();
        return redirect('/admin')->with('income',$income);
    }
}
