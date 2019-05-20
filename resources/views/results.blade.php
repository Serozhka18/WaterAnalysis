@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Results</div>
                    <div class="card-body">
                        <div class="text-right">
                            <div class="row">
                                <div class="col">
                                    <form method="get" action="{{ route('results') }}">
                                        <div class="row">
                                            <div class="col"><div class="form-group">
                                                    <input type="text" class="form-control" name="result_key" placeholder="Enter result key" value="{{ request()->get('result_key') }}">
                                                </div></div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control" name="region_id">
                                                        <option value="">Select region</option>
                                                        @foreach($regions as $region)
                                                            <option value="{{ $region->id }}" {{ request()->get('region_id') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                                    <a href="{{ route('results') }}" role="button" class="btn btn-outline-secondary">Clear</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('results.add') }}" role="button" class="btn btn-primary">Add result</a>
                                </div></div>
                            </div>
                            <br>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Region</th>
                                <th scope="col">Result</th>
                                <th scope="col">Date</th>
                                <th scope="col">#</th>
                                <th scope="col">#</th>
                                <th scope="col">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <th scope="row">{{ $result->id }}</th>
                                    <td>{{ $result->region->name }}</td>
                                    <td>{{ $result->result }}</td>
                                    <td>{{ date('m.d.y', time($result->created_at)) }}</td>
                                    <td><a href="{{ route('results.show', ['id' => $result->id]) }}">View</a></td>
                                    <td><a href="{{ route('results.edit', ['id' => $result->id]) }}">Edit</a></td>
                                    <td><a href="{{ route('results.delete', ['id' => $result->id]) }}">Delete</a></td>
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
