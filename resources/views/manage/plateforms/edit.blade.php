@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layout.errors-and-messages')
        <div class="box">
            <form action="{{ route('plateforms.update' , $plateform -> id) }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="hidden" name="id" value="{{ $plateform -> id }}">
                        @method('put')
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $plateform -> name }}">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('plateforms.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
