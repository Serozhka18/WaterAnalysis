@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('results.update', ['id' => $result->id]) }}">
                    <div class="form-group">
                        <label for="region">Select Region</label>
                        <select class="form-control" id="region" name="region_id">
                            @foreach($regions as $region)
                                <option
                                    value="{{ $region->id }}" {{ $region->id === $result->region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="result">Result</label>
                        <textarea class="form-control" id="result" rows="3"
                                  name="result">{{ $result->result }}</textarea>
                    </div>
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
