@extends('layouts.master')

@section('title', 'Users')

@section('breadcrumb')
<!-- <li class="breadcrumb-item">Sample Page</li> -->
<li class="breadcrumb-item active">Users</li>
@endsection

@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Users</h3>
        <div class="pull-right">
            <a href="{{route('users.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
            <a href="#" onclick="window.history.back()" class="btn btn-sm btn-light" href="#"><i class="fa fa-fw fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover display nowrap dataTable" role="grid">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>	
                    @foreach($users as $user)	
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{ucfirst($user->role)}}</td>
                        <td>
                            <a href="{{route('users.edit', $user->id)}}"><i class="fa fa-edit p-2"></i></a>
                            <a href="#" data-url="{{route('users.softdelete', $user->id)}}" data-toggle="model" class="btnDelete"><i class="fa fa-trash p-2"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>				  
        </div>   
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

@section('script')
@endsection