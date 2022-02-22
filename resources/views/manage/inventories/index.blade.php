@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layout.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h2>Inventories</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Plateform</td>
                                <td>Quantity</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($games as $game)
                            <tr>
                                <td>{{ $game -> name }}</td>
                                <td>{{ $game -> plateform -> name }}</td>
                                <td>{{ $game -> inventory -> count() }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('inventories.import' , ['id' => $game -> id]) }}" class="btn btn-success btn-sm"><i class="fa fa-truck"></i> Import</a>
                                        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</a>
                                    </div>
                                </td>
                            </tr>                            
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
