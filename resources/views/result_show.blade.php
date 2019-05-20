@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>ID:</b> {{ $result->id }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $result->result }}
                    </p>
                </div>
                <div class="card-footer text-muted text-right">
                    {{ date('Y-m-d H:i:s', time($result->created_at)) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
