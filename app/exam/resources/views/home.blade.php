@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">Companies</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Company name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Country</th>
                                <th scope="col">Job</th>
                                <th scope="col">Domain</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $key =>$company)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td>{{ $company->country }}</td>
                                    <td>{{ $company->job_name }}</td>
                                    <td>{{ $company->domain }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Workers</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($workers as $key => $worker)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $worker['name'] }}</td>
                                    <td>{{ $worker['age'] }}</td>
                                    <td>{{ $worker['gender'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
