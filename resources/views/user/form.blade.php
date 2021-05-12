@extends('layouts.master')
@section('title')
<?php $type = (isset($user)) ? 'Edit' : 'Add' ?>
{{$type}} User
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
<li class="breadcrumb-item active">{{$type}} Users</li>
@endsection

@section('content')

@if(isset($user))
<form action="{{route('users.update', $user->id)}}" method="post">
@else
<form action="{{route('users.store')}}" method="post">
@endif
    @csrf
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-3 form-group">
                    <label>Name:</label>
                    <div class="controls">
                        <input required type="text" name="name" value="{{old('name', $user->name)}}" class="form-control">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="col-3 form-group">
                    <label>Email:</label>
                    <div class="controls">
                        <input required type="email" name="email" value="{{old('email',$user->email)}}" class="form-control">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="col-3 form-group">
                    <label>Role:</label>
                    <div class="controls">
                        <select name="role" class="form-control">
                            <option <?=($user->role == 'user') ? "selected" : ""?> value="user">User</option>
                            <option <?=($user->role == 'admin') ? "selected" : ""?> value="admin">Admin</option>
                        </select>
                    </div>
                    <!-- /.input group -->
                </div>
                @if(isset($user))
                <div class="col-4 form-group">
                    <label>Update Password:</label>
                    <div class="controls">
                        <div class="demo-checkbox">
                            <input type="checkbox" name="update_password" id="update_password" class="filled-in" onclick="updatePassword()"/>
                            <label for="update_password"></label>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
                @endif
            </div>
            <div class="row" style="display:<?=(isset($user)? "none" : "block")?>" id="div_password">
                <div class="col-4 form-group">
                    <label>Password:</label>
                    <div class="controls">
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="col-4 form-group">
                    <label>Confirm Password:</label>
                    <div class="controls">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>




        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-actions mt-10">
                <button type="submit" class="btn btn-sm btn-outline btn-success"><i class="fa fa-check"></i> Save</button>
                <button type="button" class="btn btn-sm btn-outline btn-danger">Cancel</button>
            </div>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</form>




@endsection

@section('script')
<script>
  function updatePassword() {
    var checkbox = document.getElementById("update_password");
    var div = document.getElementById("div_password");
    if (checkbox.checked == true){
      div.style.display = "block";
    } else {
       div.style.display = "none";
    }
  }
</script>
@endsection
