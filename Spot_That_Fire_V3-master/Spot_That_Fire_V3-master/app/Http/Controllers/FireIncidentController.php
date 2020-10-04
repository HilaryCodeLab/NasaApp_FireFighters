<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\FireIncident;
use Illuminate\Support\Facades\Session;


class FireIncidentController extends Controller
{
    public function index(Request $request){
        $fireIncident = FireIncident::orderBy('id','DESC')->paginate(5);
        return view('fireIncidents.index',compact('fireIncident'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
    Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('fireIncidents.create');
    }

    public function store(FireIncident $fireIncident, Request $request){

        $fireIncident->title = request('title');
        $fireIncident->first_name = request('first_name');
        $fireIncident->last_name = request('last_name');
        $fireIncident->email = request('email');
        $fireIncident->phone_number = request('phone_number');
        $fireIncident->message = request('message');
        $fireIncident->ip_address = $request->ip();
        $fireIncident->save();
        return redirect('/fireIncidents')->with('status','Fire incident is created successfully');
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }

    public function destroy(){

    }
}
