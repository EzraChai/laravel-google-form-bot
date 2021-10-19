@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-4">
            <div class="card border-secondary mb-3">
                <div class="card-header">{{ __('Edit Profile') }}</div>
                <div class="card-body">
                    <form action="/profile/{{$user -> id}}/edit" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user -> name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="school_class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                            <div class="col-md-6">
                                <input id="school_class" placeholder="4 BAIDURI" type="text" class="form-control @error('school_class') is-invalid @enderror" name="school_class" value="{{ old('school_class') ??  $user -> school_class }}" required autocomplete="name" autofocus>

                                @error('school_class')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4 d-flex">
                                <input type="submit" class="btn btn-outline-dark" value="Submit"/>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
