<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use App\Http\Requests\StoreSkillsRequest;
use App\Http\Requests\UpdateSkillsRequest;

class SkillsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['message'] = "Berhasil";
        $skills = Skills::get(['name','id']);
        $data['data'] = $skills; 
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Skills $skills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skills $skills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillsRequest $request, Skills $skills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skills $skills)
    {
        //
    }
}
