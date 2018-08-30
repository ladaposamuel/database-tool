@extends('home.master')
@section('contents')
    <div class="row justify-content-md-center">

        <div class="col-md-6">
            <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
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
                    <h5 class="card-title">Results</h5>
                    <table id="myTable" class="table">
                        <thead>
                        <tr>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Sex</th>
                            <th scope="col">Network</th>
                            <th scope="col">State</th>
                            <th scope="col">LGA</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['results'] as $res)
                            <tr>
                                <td>{{$res->firstname}}</td>
                                <td>{{$res->lastname}}</td>
                                <td>{{$res->phone}}</td>
                                <td>{{$res->sex}}</td>
                                <td>{{$res->network}}</td>
                                <td>{{$res->state}}</td>
                                <td>{{$res->lga}}</td>
                            </tr>
                        @empty
                            nothing found
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection