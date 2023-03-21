@extends('layouts.master')

@section('title','Book An Appointment')

@section('content')

    <div class="page-wrapper p-t-100 p-b-50" style="background:green;">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                @if(session('success')) 
                    <div class="alert alert-success"> 
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('bookAppointment') }}">
                        @csrf
                        <div class="form-row">
                            <div class="name">Full name</div>
                            <div class="value">
                                <input class="input--style-6 form-control @error('full_name') is-invalid @enderror" type="text" name="full_name" placeholder="Enter your full name" value="{{ old('full_name') }}" autocomplete="full_name">

                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date of Appointment</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6 form-control @error('date') is-invalid @enderror" type="datetime-local" name="date" value="{{ old('date') }}" autocomplete="date">

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Reason for Appointment</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6 form-control @error('date') is-invalid @enderror" placeholder="What is the reason for your appointment?" name="body" value="{{ old('body') }}" autocomplete="body"></textarea>

                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit" style="background:green; color:white;" name="submit">Book Appointment</button>
                        </div>
                    </form>
                </div>              
            </div>
        </div>
    </div>

@endsection