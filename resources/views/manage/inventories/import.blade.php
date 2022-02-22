@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layout.errors-and-messages')
        <div class="box">
            <form action="" method="post" class="form" enctype="multipart/form-data">                
                <div class="box-body">
                    <div class="row clearfix">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Excel <span class="text-danger">*</span></label>
                                <input type="file" name="excel" id="excel" placeholder="Excel" class="form-control" value="{{ old('excel') }}">
                            </div>
                        </div>
                        <input type="hidden" name="game_id" value="{{ $game -> id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plateform_id">Plateform <span class="text-danger">*</span></label>                                
                                <select name="plateform_id" id="plateform_id" class="form-control" placeholder="Plateform" disabled>
                                    @foreach ($plateforms as $plateform)
                                        <option value="{{ $plateform -> id }}" @if ( $plateform -> id == $game -> plateform -> id ) checked @endif>{{ $plateform -> name}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>                                                       
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
