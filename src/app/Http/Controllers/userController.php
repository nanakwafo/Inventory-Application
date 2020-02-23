<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
use Sentinel;
class userController extends Controller
{
    //
    public function index(){
        return view('user',[
            'routeName'=> parent::getRouteName()
        ]);
    }
    public function allusers(){
        DB::statement(DB::raw('set @rownum=0'));
        $users = DB::table('users')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->select(DB::raw('@rownum  := @rownum  + 1 AS rownum'),'users.id','users.first_name','users.last_name','users.sex','users.email','roles.name as priviledge','users.last_login','users.username','users.phonenumber')
            ->get();


        $datatables =  Datatables::of($users)

            ->addColumn('action', function ($users) {
                return '
                  <a href="" class="editmodal" data-id="'.$users->id.'" data-phonenumber="'.$users->phonenumber.'"  data-firstname="'.$users->first_name.'" data-lastname="'.$users->last_name.'" data-sex="'.$users->sex.'" data-priviledge="'.$users->priviledge.'" data-username="'.$users->username.'" data-email="'.$users->email.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="" class="deletemodal" data-id="'.$users->id.'" data-firstname="'.$users->first_name.'" data-lastname="'.$users->last_name.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });

       
        return $datatables->make(true);
    }
    public function adduser(Request $request){
      

        $credentials = [
            'email'    => $request->email,
            'username'    => $request->username,
            'password' => $request->password,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'phonenumber' => $request->phonenumber,
            'permissions'=>Sentinel::findRoleByName($request->role)->permissions
        ];

        $user = Sentinel::registerAndActivate($credentials);
        $role=Sentinel::findRoleBySlug($request->role);
        $role->users()->attach($user);

        Session::flash('success',"$request->firstname $request->lastname has been Succesfully added");

        return redirect('user');
    }
    public function edituser(Request $request){

        $previousrole = Sentinel::findById($request->idEdit)->roles()->first();//get previous role of user

        $user = Sentinel::findById($request->idEdit);               ////////////////////
        $role = Sentinel::findRoleByName($previousrole->name);       /////Remove user role////////////////
        $role->users()->detach($user);                               ////////////////


        $user1 = Sentinel::findById($request->idEdit);
        Sentinel::update($user1, array(
            'first_name' => $request->firstnameEdit,
            'last_name' => $request->lastnameEdit,
            'password' => $request->passwordEdit,
            'username' => $request->usernameEdit,
            'sex' => $request->sexEdit,
            'phonenumber' => $request->phonenumberEdit,
            'email' => $request->emailEdit,
            'permissions'=>Sentinel::findRoleByName($request->role)->permissions
        ));

        $role_edit=Sentinel::findRoleBySlug($request->roleEdit);
        $role_edit->users()->attach($user);


        Session::flash('success',"User details has been Succesfully updated");


        return redirect('user');



    }
    public function deleteuser(Request $request){

        $user = Sentinel::findById($request->idDelete);

        if($user->delete()){
            Session::flash('success',"User  has been Succesfully Deleted");

            return redirect('user');
        }

    }
}
