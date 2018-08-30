@extends('home.master')
@section('contents')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <a href="{{route('home')}}" class="btn btn-primary">Go back </a>
            <a href="{{asset('uploads/sample.xlsx')}}" class="btn btn-warning">xlsx Sample </a>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <h5 class="card-title">Import</h5>
                    <form action="{{route('search')}}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="form-group">
                                <label for="">xlsx File</label>
                                <input type="file" class="form-control">
                            </div>

                        </div>

                        <button class="btn btn-primary" type="submit">Import File</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection