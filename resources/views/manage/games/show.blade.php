@extends('layout.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layout.errors-and-messages')
        <div class="box">            
            <div class="box-body">
                <div class="row clearfix">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $game -> name }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="plateform_id">Plateform <span class="text-danger">*</span></label>                                
                            <select name="plateform_id" id="plateform_id" class="form-control" placeholder="Plateform" disabled>
                                @foreach ($plateforms as $plateform)
                                    <option value="{{ $plateform -> id}}">{{ $plateform -> name}}</option>
                                @endforeach                                    
                            </select>
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price <span class="text-danger">*</span></label>     
                            <input class="form-control" type="text" name="price" id="price" value="{{ $game -> price }}" disabled>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exchange_id">Exchange <span class="text-danger">*</span></label>     
                            <select name="exchange_id" id="exchange_id" class="form-control" placeholder="Exchange" disabled>
                                @foreach ($exchanges as $exchange)
                                    <option value="{{ $exchange -> id}}">{{ $exchange -> name}}</option>
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
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
