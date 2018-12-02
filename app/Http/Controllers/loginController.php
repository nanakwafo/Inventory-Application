<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
class loginController extends Controller
{
    //
    public  function index(){
        return view('welcome');
    }
    public function login(Request $request){
        try{
            $credentials = [
                'username'    => $request->username,
                'password' => $request->password,
            ];
//            dd($credentials);
            if(Sentinel::authenticate($credentials)){
                return redirect('dashboard');
            }else
            {

                return redirect()->back()->with(['error'=>'wrong credentials']);

            }
        }catch(ThrottlingException $e){
            $delay=$e->getDelay();
            return redirect()->back()->with(['error'=>"You are banned for $delay seconds."]);

        }catch (NotActivatedException $e){
            return redirect()->back()->with(['error'=>"Your account has not been activated"]);
        }

    }
    public function logout(){
        Sentinel::logout();
        return redirect('/');
    }
}
