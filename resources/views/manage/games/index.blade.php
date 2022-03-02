@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layout.errors-and-messages')
    <!-- Default box -->
        @if(!$games->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h2>games</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Plateform</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($games as $game)
                                <tr>
                                    <td>
                                        <a href="{{ route('games.show', $game->id) }}">{{ $game -> name }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('plateforms.show', $game -> plateform ->id) }}">{{ $game -> plateformName }}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('games.destroy', $game->id) }}" method="post" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <div class="btn-group">
                                                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $games->links() }} --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @else
            <p class="alert alert-warning">No game created yet. <a href="{{ route('games.create') }}">Create one!</a></p>
        @endif
    </section>
    <!-- /.content -->
@endsection
