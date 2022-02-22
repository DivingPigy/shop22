@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layout.errors-and-messages')
        <div class="box">
            <form action="{{ route('games.store') }}" method="post" class="form" enctype="multipart/form-data">                
                <div class="box-body">
                    <div class="row clearfix">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plateform_id">Plateform <span class="text-danger">*</span></label>                                
                                <select name="plateform_id" id="plateform_id" class="form-control" placeholder="Plateform">
                                    @foreach ($plateforms as $plateform)
                                        <option value="{{ $plateform -> id}}">{{ $plateform -> name}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price <span class="text-danger">*</span></label>     
                                <input class="form-control" type="text" name="price" id="price">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exchange_id">Exchange <span class="text-danger">*</span></label>     
                                <select name="exchange_id" id="exchange_id" class="form-control" placeholder="Exchange">
                                    @foreach ($exchanges as $exchange)
                                        <option value="{{ $exchange -> id}}">{{ $exchange -> name}}</option>
                                    @endforeach 
                                </select> 
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file">Cover <span class="text-danger">*</span></label>     
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img">Image <span class="text-danger">*</span></label>     
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-12">
                            <label for="description">Description <span class="text-danger">*</span></label>    
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                 
                                <textarea name="description" id="description" cols="188" rows="10"></textarea>
                            </div>
                        </div>                   
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('games.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
