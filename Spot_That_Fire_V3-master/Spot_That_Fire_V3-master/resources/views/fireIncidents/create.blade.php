@extends('layouts.app')

@section('title')
    Fire Incident: Report
@endsection

@section('content')
    <div class="container">
        <p>This page will report a fire incident</p>
        <form method="POST" action="/fireIncidents">
            @csrf
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input
                        required="required"
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        maxlength="48"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input
                        required="required"
                        type="text"
                        class="form-control"
                        id="first_name"
                        name="first_name"
                        maxlength="48"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input
                        required="required"
                        type="text"
                        class="form-control"
                        id="last_name"
                        name="last_name"
                        maxlength="48"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input
                        required="required"
                        type="tel"
                        class="form-control"
                        id="phone_number"
                        name="phone_number"
                        maxlength="10"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input
                        required="required"
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        maxlength="48"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="message" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                    <textarea
                        required="required"
                        type="text"
                        class="form-control"
                        id="message"
                        name="message"
                        maxlength="255"
                        value="">
                    </textarea>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </div>
        </form>
    </div>
@endsection
