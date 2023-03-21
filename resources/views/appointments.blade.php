@extends('layouts.master')

@section('title', 'Appointments')

@section('content')
    <div class="row" style="margin-top:20px;">
        <div class="col-md-2"></div>

        <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Your Appointments</h4>
                  <p class="card-description">
                    Appointments are approved within 24 hrs.
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Date of Appointment</th>
                            <th scope="col">Reason for Appointment</th>
                            <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php  $count = 1; @endphp
                        @foreach($appointments as $appointment)
                          @if($appointment->user == Auth::user()->email)
                            <tr>
                                <th scope="row">{{ $count++ }}</th>
                                <td>{{ $appointment->full_name }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->body }}</td>
                                @if($appointment->status == 'pending')
                                  <td><div class="btn btn-danger">{{ $appointment->status }} <i class="fa fa-clock"></i></div></td>
                                @else
                                  <td><div class="btn btn-success">{{ $appointment->status }} <i class="fa fa-marked"></i></div></td>
                                @endif
                            </tr>
                          @endif
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>


       
    
@endsection