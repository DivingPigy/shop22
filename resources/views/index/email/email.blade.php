@extends('layout.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
<div class="container">
    <div class="box">
        <form action="{{ route('contact.post') }}" method="post" class="form">                
            <div class="box-body">
                <div class="row clearfix">
                    {{ csrf_field() }}
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="email">Your Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" class="form-control" value="{{ old('email') }}">                            
                        </div>
                    </div>   
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="from">From <span class="text-danger">*</span></label>     
                            <input type="text" name="from" id="from" placeholder="From" class="form-control" value="{{ old('from') }}">
                        </div>
                    </div> 
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="subject">Subject <span class="text-danger">*</span></label>     
                            <input type="text" name="subject" id="subject" placeholder="subject" class="form-control" value="{{ old('subject') }}">
                        </div>
                    </div>  
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="text">Text <span class="text-danger">*</span></label>    
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <textarea name="text" id="text" cols="150" rows="10"></textarea> 
                    </div>   
                </div>
            </div>
            <!-- /.box-body -->
            <br>

            <div class="box-footer">
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection