<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserApprovalRequest;
use App\Http\Requests\UpdateUserApprovalRequest;
use App\Models\UserApproval;

class UserApprovalController extends Controller
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
     * @param  \App\Http\Requests\StoreUserApprovalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserApprovalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserApproval  $userApproval
     * @return \Illuminate\Http\Response
     */
    public function show(UserApproval $userApproval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserApproval  $userApproval
     * @return \Illuminate\Http\Response
     */
    public function edit(UserApproval $userApproval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserApprovalRequest  $request
     * @param  \App\Models\UserApproval  $userApproval
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserApprovalRequest $request, UserApproval $userApproval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserApproval  $userApproval
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserApproval $userApproval)
    {
        //
    }
}
