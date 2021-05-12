@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumb')
<!-- <li class="breadcrumb-item">Sample Page</li> -->
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<!-- Default box -->


    <div class="col-8">
        <form action="{{route('times.store')}}" method="post">
            @csrf
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Mark Attendance</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-4 form-group">
                            <div class="controls">
                                <input <?= $startable == true ? "" : "disabled"?> required name="type" type="radio" id="type_1" value="start"/>
                                <label for="type_1">In</label>
                                <input <?= $endable == true ? "" : "disabled"?> name="type" type="radio" id="type_2" value="end"/>
                                <label for="type_2">Out</label>
                            </div>
                            <!-- /.input group -->
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-actions mt-10">
                        <button type="submit" class="btn btn-sm btn-outline btn-success"><i class="fa fa-check"></i> Submit</button>
                        <button type="button" class="btn btn-sm btn-outline btn-danger">Cancel</button>
                    </div>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </form>
    </div>




<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Last Records</h3>
        <div class="pull-right">
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover display nowrap dataTable" role="grid">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>	
                    @foreach($times as $time)	
                    <tr>
                        <td>{{$time->user->name}}</td>
                        <td>{{$time->start}}</td>
                        <td>{{$time->end}}</td>
                        <td>{{$time->duration}}</td>
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