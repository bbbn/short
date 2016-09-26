@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Insert URL
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                 

                    <!-- New Task Form -->
                    <form  method="POST" class="form-horizontal" id="formid" action="javascript:void(null);" onsubmit="call()">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">URL</label>

                            <div class="col-sm-7">
                                <input type="text" name="name" id="task-name" class="form-control" value="">
                            </div>

                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add URL
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
         
        </div>
    </div>
@endsection