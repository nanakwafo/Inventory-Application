@extends('layouts.app')
@section('title','user')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>User</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->
        <div class="content-top">


            <div class="col-md-4 ">
                @include('partials.messages')
                <div class="validation-system">

                    <div class="validation-form">
                        <!---->

                        <form action="adduser" method="post">
                            {{csrf_field()}}
                            <div class="vali-form">
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">First Name</label>
                                    <input type="text" name="first_name"  required="">
                                </div>
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="last_name"  required="">
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="vali-form">
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="email"  required="">
                                </div>
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Phone Number</label>
                                    <input type="text" name="phonenumber" required="">
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="vali-form">
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Username</label>
                                    <input type="text" name="username" required="">
                                </div>
                                <div class="col-md-6 form-group1">
                                    <label class="control-label">Password</label>
                                    <input type="text" name="password"  required="">
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="col-md-12 form-group2 group-mail">
                                <label class="control-label">Sex</label>
                                <select name="sex">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group2 group-mail">
                                <label class="control-label">Role</label>
                                <select name="role">
                                    <option value="">Select</option>
                                    @foreach(\Cartalyst\Sentinel\Roles\EloquentRole::all() as $s)
                                        <option value="{{$s->name}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"> </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            <div class="clearfix"> </div>
                        </form>

                        <!---->
                    </div>

                </div>
            </div>
            <div class="col-md-8 ">
                <table class="table table-bordered " id="users-table">
                    <thead>
                    <tr>
                        <th style="background-color: white;color: black">No.</th>
                        <th style="background-color: white;color: black">First Name</th>
                        <th style="background-color: white;color: black">Last Name</th>
                        <th style="background-color: white;color: black;">Email</th>
                        <th style="background-color: white;color: black;">Phone number</th>
                        <th style="background-color: white;color: black;">Username</th>
                        <th style="background-color: white;color: black;">Sex</th>
                        <th style="background-color: white;color: black;">Role</th>
                        <th style="background-color: white;color: black;">Action</th>
                    </tr>
                    </thead>
                </table>

            </div>
            <div class="clearfix"> </div>
            <div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <form action="{{route('edituser')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Edit</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="idEdit" name="idEdit" />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Firstname</label>
                                            <input type="text" class="form-control"  id="firstnameEdit" name="firstnameEdit">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Lastname</label>
                                            <input type="text" class="form-control"  id="lastnameEdit" name="lastnameEdit">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Username</label>
                                            <input type="text" class="form-control" id="usernameEdit"  name="usernameEdit">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Email</label>
                                            <input type="text" class="form-control" id="emailEdit"  name="emailEdit">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Sex</label>
                                            <select name="sexEdit" class="form-control" id="sexEdit" >
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>

                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Phone number</label>
                                            <input type="text" class="form-control" id="phonenumberEdit"  name="phonenumberEdit">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group2 group-mail">
                                            <label for="field-1" class="control-label">Role</label>
                                            <select name="roleEdit" id="roleEdit">
                                                <option value="">Select</option>
                                                @foreach(\Cartalyst\Sentinel\Roles\EloquentRole::all() as $s)
                                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Password</label>
                                            <input type="password" class="form-control"  id="passwordEdit"  name="passwordEdit" required>
                                        </div>
                                    </div>


                                </div>



                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button  type="submit" class="btn  waves-effect waves-light">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal -->
            <div id="deletemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <form action="{{route('deleteuser')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Delete</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Are you sure you want to delete <span id="name_delete"></span>?</label>
                                            <input type="hidden" class="form-control" id="idDelete" placeholder="John" name="idDelete" >
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button  type="submit" class="btn  waves-effect waves-light">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal -->
            <div id="forgotpasswordModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->

                    <div class="modal-content">


                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Forgot Password</h4>
                        </div>
                        <div class="modal-body">

                            <input type="hidden" id="useridedit"  name="userid" class="form-control" >


                            <div class="form-group">
                                <label for="exampleInputPassword1">Email:</label>
                                <input type="email" id="useremail" name="email"class="form-control"  >
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                            <a type="submit" id="add-row" class="sendcode btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Send Code</a>
                        </div>




                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection

