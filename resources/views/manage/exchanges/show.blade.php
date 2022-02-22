@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layout.errors-and-messages')
        <div class="box">              
                <div class="box-body">
                    <div class="row clearfix">
                        {{ csrf_field() }}
                        @method('put')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" disabled value="{{ $exchange -> name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Symbol <span class="text-danger">*</span></label>
                                <input type="text" name="symbol" id="symbol" placeholder="Symbol" class="form-control" disabled value="{{ $exchange -> symbol }}">
                            </div>
                        </div>                            
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('exchanges.index') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
