@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" disabled value="{{ $plateform -> name }}">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('plateforms.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
