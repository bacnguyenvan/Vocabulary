<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\vocabulary;
use Mail;
class Mycontroller extends Controller
{

    public $nameUser;
    public function login(Request $request){

        if($request->isMethod('post')){
            $login=[
                'name'      =>$request['userName'],
                'password'  =>$request['pass']
            ];
            if(Auth::attempt($login)){
                return redirect()->route('home');
            }else
            {
                return view('login',['error'=>'Login fail!']);
            }
        }
    	return view('login');
    }

    //home
    public function home(Request $request){
        $nameUser=Auth::user()->name; // get name to login with name admin
        $getId=Auth::user()->id;

        //count total
        $data1=vocabulary::where('user_id',$getId)->get(); 
        $totalVoca=count($data1);

        $voca=vocabulary::where('user_id',$getId)->paginate(5);
        return view('home',['vocabulary'=>$voca,'nameUser'=>$nameUser,'total'=>$totalVoca]);
    }
    
    //signup
    public function signUp(Request $request){
        if($request->isMethod('post')){
            $user=new User;
            $user->name     =$request->userName;
            $user->email    =$request->email;
            $user->password =bcrypt($request->pass);

            //check email exist
            $user_email=User::where('email',$request->email)->get()->toArray();
            if(count( $user_email)==0){ // not exist
                $user->save();
                return view('signUp',['message'=>'Sign up success!Please enter login to access website']);

            }else{
                return view('signUp',['error'=>'Acount exist!Please inputting other email']);
            }
            
        }
        return view('signUp');
    }
    //lost password
    public function lostPassword(Request $request){

        $user=User::where('email',$request->email)->first();

        if($request->isMethod('post')){
            if(!empty($user)){

                $pass=str_random(5);

                User::where('email',$user->email)->update(['password'=>bcrypt($pass)]);
                $userPass=User::where('email',$user->email)->get()->toArray();

                $name=$userPass[0]['name'];
                
                $data=[
                    'content'=>'Getting password success',
                    'password'=>$pass,
                    'name'  =>$name
                ];

            
                $this->nameUser=$user->email;
                Mail::send('pageMail', $data, function ($message){
                    $message->from('bacnguyen11b41998@gmail.com','Bac Admin');
                    $message->to($this->nameUser)->subject('Getting password');
                });

                if (Mail::failures()){
                    return view('lostpassword',['message'=>'Sorry! Please try again latter']);
                }
                else{
                  return view('lostPassword',['success'=>'Success!A new password was sent your mail,please check mail and login with this new password']);
                }
            }else
            {
                return view('lostPassword',['error'=>'Acount dont sign up yet!']);
            }
        }
        return view('lostPassword');
    }

    // add
    public function addVoca(Request $request){
        $voca = new vocabulary;
        $voca->name     =$request->txtName;
        $voca->sentence =$request->txtSentence;
        $voca->mean     =$request->txtMean;
        $voca->user_id  =Auth::user()->id;
        $getId=Auth::user()->id;
        //check name exist
        $voca_name=vocabulary::where('user_id',$getId)->where('name',$request->txtName)->get()->toArray();
        if(count($voca_name)==0 && isset($voca->name)){
            $voca->save();

            return redirect()->route('home')->with(['success_add'=>'Added new word']);
        }else{
            if(!isset($voca->name))  return redirect()->route('home')->with(['error'=>'Please inputting word!']);

            return redirect()->route('home')->with(['error'=>'This word was Exist!']);
        }
    }

    //delete
    public function deleteVoca($id){
        $voca=vocabulary::find($id);
        $voca->delete($id);

    return redirect()->route('home')->with(['success'=>'Delete success!']);

    }

    //edit
    public function editVoca(Request $request,$id){
        if($request->isMethod('post'))
        {
            $voca=vocabulary::find($id);
            $voca->name     =$request->txtName;
            $voca->sentence =$request->txtSentence;
            $voca->mean     =$request->txtMean;
            $voca->user_id  =Auth::user()->id;

            $voca->save();
            return redirect()->route('home')->with(['editSuccess'=>'Edit success']);
        }
        $data=vocabulary::find($id);
        return view('edit',compact('data'));
    }

    //setting
    public function setting(Request $request){
        $userName=Auth::user()->name;

        if($request->isMethod('post')){
            $pass   =$request->txtPass;
            $name   =$request->txtName;

            User::where('name',$userName)->update(['name'=>$name,'password'=>bcrypt($pass)]);

            return view('setting',['name'=>$userName,'success'=>'Changing your account information success']);
        }
        return view('setting',['name'=>$userName]);
    }

    //search
    
    public function search(Request $request){

        $id=Auth::user()->id;
        //showing when search don't data
        $data=vocabulary::where('user_id',$id);

        $word       =$request->txtVoca;
        $meaning    =$request->txtMean;
        $nameUser=Auth::user()->name;
        $voca=new vocabulary;

        if(!empty($word))       $data=vocabulary::where('user_id',$id)->where('name','LIKE','%'.$word.'%');
        if(!empty($meaning))    $data=vocabulary::where('user_id',$id)->where('mean','LIKE','%'.$meaning.'%');

        $data1=$data->get();
        $totalVoca=count($data1);
        
        $data=$data->paginate(5);
    
        return view('home',['vocabulary'=>$data,'nameUser'=>$nameUser,'total'=>$totalVoca]);
    }
}
