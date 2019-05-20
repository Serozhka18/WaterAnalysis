@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="{{ route('results.save') }}">
                <div class="form-group">
                    <label for="region">Select Region</label>
                    <select class="form-control" id="region" name="region_id">
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="result">Result</label>
                    <textarea class="form-control" id="result" rows="3" name="result"></textarea>
                </div>
                {{ csrf_field() }}
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
