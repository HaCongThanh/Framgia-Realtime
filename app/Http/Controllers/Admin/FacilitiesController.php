<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FacilityRequest;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::Paginate(10);
        return view('admin.facility.lists', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityRequest $request)
    {
        $facility = new Facility(array(
            'name' => $request -> get('name'),
        ));
        $facility->save();
        return redirect()->route('facility.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facility.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityRequest $request, $id)
    {
        $facility = Facility::findOrFail($id);
        $facility->name = $request->get('name');
        $facility->save();

        return redirect()->route('facility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();

        return redirect()->route('facility.index');
    }
}
