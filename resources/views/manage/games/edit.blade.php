@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layout.errors-and-messages')
        <div class="box">
            <form action="{{ route('games.update' , $game -> id) }}" method="post" class="form" enctype="multipart/form-data">                
                <div class="box-body">
                    <div class="row clearfix">
                        {{ csrf_field() }}
                        @method('put')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $game -> name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Plateform <span class="text-danger">*</span></label>                                
                                <select name="plateform_id" id="plateform_id" class="form-control" placeholder="Plateform">
                                    @foreach ($plateforms as $plateform)
                                        <option value="{{ $plateform -> id}}" 
                                            @if ($game -> plateform == $plateform -> id) 
                                                selected 
                                            @endif >
                                            {{ $plateform -> name}}
                                        </option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>     
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Price <span class="text-danger">*</span></label>
                                <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="{{ $game -> price }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Exchange <span class="text-danger">*</span></label>                                
                                <select name="exchange_id" id="exchange_id" class="form-control" placeholder="Exchange">
                                    @foreach ($exchanges as $exchange)
                                        <option value="{{ $exchange -> id}}" 
                                            @if ($game -> exchange_id == $exchange -> id) 
                                                selected 
                                            @endif >
                                            {{ $exchange -> name}}
                                        </option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file">Cover <span class="text-danger">*</span></label>     
                                <img src="{{asset($game -> cover)}}" alt="" srcset="">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img">Image <span class="text-danger">*</span></label>     
                                <img src="{{asset($game -> image)}}" alt="" srcset="">
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
                                <textarea name="description" id="description" cols="188" rows="10" disabled>{{ $game -> description }}</textarea>
                            </div>
                        </div>  
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('games.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
