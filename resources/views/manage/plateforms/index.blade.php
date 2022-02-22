@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layout.errors-and-messages')
    <!-- Default box -->
        @if(!$plateforms->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h2>plateforms</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($plateforms as $plateform)
                            <tr>
                                <td>
                                    <a href="{{ route('plateforms.show', $plateform->id) }}">{{ $plateform->name }}</a>
                                </td>
                                <td>
                                    <form action="{{ route('plateforms.destroy', $plateform->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('plateforms.edit', $plateform->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $plateforms->links() }} --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @else
            <p class="alert alert-warning">No plateform created yet. <a href="{{ route('plateforms.create') }}">Create one!</a></p>
        @endif
    </section>
    <!-- /.content -->
@endsection
