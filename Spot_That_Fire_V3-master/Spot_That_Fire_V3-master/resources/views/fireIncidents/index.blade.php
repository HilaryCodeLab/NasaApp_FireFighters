@extends('layouts.app')

@section('title')
    Fire Incidents: Show list of fire incidents
@endsection

@section('content')
    <div class="container">
        <p>This page will show list of fire incidents</p>
        <p>
            <a href="{{route('fireIncidents.create')}}" class="btn btn-primary">Create new</a>
            <a href="/" class="btn btn-secondary">Home</a>
        </p>
        <table class="table">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            @endif
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Date</th>
                <th scope="col">IP Address</th>
                <th scope="col">Title</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Message</th>

            </tr>
            </thead>
            <tbody>
            @foreach($fireIncident as $incident)
                <tr>
                    <th scope="row">{{$incident->id}}</th>
                    <th scope="row">{{$incident->created_at}}</th>
                    <td>{{$incident->ip_address}}</td>
                    <td>{{$incident->title}}</td>
                    <td>{{$incident->first_name}}</td>
                    <td>{{$incident->last_name}}</td>
                    <td>{{$incident->email}}</td>
                    <td>{{$incident->phone_number}}</td>
                    <td>{{$incident->Message}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$fireIncident->links()}}
    </div>
@endsection

