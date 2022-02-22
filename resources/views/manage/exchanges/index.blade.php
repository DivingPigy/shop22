@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layout.errors-and-messages')
    <!-- Default box -->
        @if(!$exchanges->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h2>exchanges</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Symbole</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($exchanges as $exchange)
                            <tr>
                                <td>
                                    <a href="{{ route('exchanges.show', $exchange->id) }}">{{ $exchange->name }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('exchanges.show', $exchange->id) }}">{{ $exchange->symbol }}</a>
                                </td>
                                <td>
                                    <form action="{{ route('exchanges.destroy', $exchange->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('exchanges.edit', $exchange->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $exchanges->links() }} --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @else
            <p class="alert alert-warning">No exchange created yet. <a href="{{ route('exchanges.create') }}">Create one!</a></p>
        @endif
    </section>
    <!-- /.content -->
@endsection
