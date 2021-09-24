@extends('layout.master')
@section('title', 'Data Profile')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-20">
                <div class="panel panel-default card-view">
                    @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                {{ session()->get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                                </div>
                                @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif  
                    <h4>Edit Profile</h4>
                    <hr>




                    <div class="row">
                        <!-- left column -->
                        <form class="form-horizontal" role="form">
                        <div class="col-md-3">
                            <div class="text-center">

                                <img src="{{ url('img/logo') }}/{{ Auth::user()->gambar }}" class="avatar img-circle" alt="avatar" style="width: 200px; height: 200px;">
                                <h6>Upload your photo...</h6>

                                <input type="file" name="profImage">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>

                        <!-- edit form column -->
                        <div class="col-md-5 personal-info">

                            <h3>Personal info</h3>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama:</label>
                                <div class="col-lg-8">
                                <input class="form-control" name="fname" type="text" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Divisi</label>
                                <div class="col-lg-8">
                                <input class="form-control" name="divisi" type="text" value="{{ Auth::user()->divisi }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-8">
                                <input class="form-control" name="email" type="text" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-8">
                                <input class="form-control" name="email" type="password" value="">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                                <span></span>
                                <a  href="/home2"> <input type="button" href="/home2" class="btn btn-default" value="Cancel">
                                </div>
                            </div>
                            </form>
                        
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection