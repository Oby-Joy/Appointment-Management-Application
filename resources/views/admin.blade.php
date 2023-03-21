@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-lg-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Appointments</h4>
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
                        @foreach($appointments as $appointment)
                            <tr>
                                <th scope="row">{{ $appointment->id }}</th>
                                <td>{{ $appointment->full_name }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->body }}</td>
                                @if($appointment->status == 'pending')
                                    <form method="POST" action="{{ route('approveAppointment', ['id' => $appointment->id]) }}">
                                        @csrf
                                        <td><button class="btn btn-success" type="submit">Approve <i class="fa fa-ticked"></i></button></td>
                                    </form>
                                @else
                                    <td><div class="btn btn-success disabled">Approved <i class="fa fa-ticked"></i></div></td>
                                @endif
                            </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>

        <div class="paginate" style="margin-top:20px; margin-left:100px;">
            {{ $appointments->links() }}
        </div>
        
        

    </div>
    
@endsection