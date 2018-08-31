@extends('home.master')
@section('contents')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <a href="{{route('import.view')}}" class="btn btn-primary">Import FIle</a>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                        @endif
                            @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
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
                    <h5 class="card-title">Search</h5>
                    <form action="{{route('search')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="search">Enter search term </label>
                                <input type="text" class="form-control" name="term">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="var">Variable</label>
                                <select name="var" id="" class="form-control">
                                    <option value="date_of_first_entry">Date of First Entry</option>
                                    <option value="mobgidi_balance">Mobgidi Balance</option>
                                    <option value="number">Number</option>
                                    <option value="first_name">Firstname</option>
                                    <option value="surname">Surname</option>
                                    <option value="email_address">Email Address</option>
                                    <option value="state">State</option>
                                    <option value="lg">LGA</option>
                                    <option value="sex">Sex</option>
                                    <option value="network_name">Network</option>
                                </select>
                            </div>
                        </div>


                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection