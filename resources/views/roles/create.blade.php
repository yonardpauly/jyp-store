@extends('admin-dashboard.main')
@section('title', 'Create Role')

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="display-4 text-center">Add Role</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('roles.store') }}" method="POST">
                                    @csrf

                                    <div class="form-group">

                                        <label for="name" class="control-label mb-1">{{ __('Name') }}</label>
                                        <input id="name" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" aria-required="true" aria-invalid="false" value="{{ old('name') }}">

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">
                                            <i class="fa fa-dot-circle-o fa-lg"></i> Submit
                                        </button>
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