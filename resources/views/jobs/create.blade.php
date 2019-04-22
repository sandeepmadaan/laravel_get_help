@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add a Job') }}</div>

                <div class="card-body">
                {!! Form::open(['route' => 'jobs.store']) !!}
                 @csrf

                        <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('email') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="budget_start_amount" class="col-md-4 col-form-label text-md-right">{{ __('Budget Start Amount') }}</label>

                            <div class="col-md-6">
                                <input id="budget_start_amount" class="form-control{{ $errors->has('budget_start_amount') ? ' is-invalid' : '' }}" name="budget_start_amount">

                                @if ($errors->has('budget_start_amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('budget_start_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="budget_end_amount" class="col-md-4 col-form-label text-md-right">{{ __('Budget End Amount') }}</label>

                            <div class="col-md-6">
                                <input id="budget_end_amount" class="form-control{{ $errors->has('budget_end_amount') ? ' is-invalid' : '' }}" name="budget_end_amount">
                                @if ($errors->has('budget_end_amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('budget_end_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        {!! Form::label('select', 'Category', ['class' => 'col-md-4 col-form-label text-md-right'] )  !!}
                        <div class="col-md-6">
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                        @if ($errors->has('category_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                        </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
