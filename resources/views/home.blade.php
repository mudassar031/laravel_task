@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <form method="get" action="{{ route('email') }}">
                            <fieldset>
                                <legend>Edit your email</legend>
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Email</label>
                                    <input type="text"  class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Edit email...">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
