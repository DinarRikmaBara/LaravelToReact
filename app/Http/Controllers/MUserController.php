<?php

namespace App\Http\Controllers;

use App\Models\mUser;
use App\Http\Requests\StoremUserRequest;
use App\Http\Requests\UpdatemUserRequest;

class MUserController extends Controller
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
     * @param  \App\Http\Requests\StoremUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mUser  $mUser
     * @return \Illuminate\Http\Response
     */
    public function show(mUser $mUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mUser  $mUser
     * @return \Illuminate\Http\Response
     */
    public function edit(mUser $mUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemUserRequest  $request
     * @param  \App\Models\mUser  $mUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemUserRequest $request, mUser $mUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mUser  $mUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(mUser $mUser)
    {
        //
    }
}
