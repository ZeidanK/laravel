<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Http\Requests\StoreContactRequestRequest;
use App\Http\Requests\UpdateContactRequestRequest;

class ContactRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactRequest  $contactRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ContactRequest $contactRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactRequest  $contactRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactRequest $contactRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequestRequest  $request
     * @param  \App\Models\ContactRequest  $contactRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequestRequest $request, ContactRequest $contactRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactRequest  $contactRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactRequest $contactRequest)
    {
        //
    }
}
