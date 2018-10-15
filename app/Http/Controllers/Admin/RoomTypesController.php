<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomTypesRequest;
use App\Models\Facility;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_type = RoomType::all();
        return view('admin.room_types.lists', compact('room_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities = Facility::all();
        return view('admin.room_types.create', compact('facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypesRequest $request)
    {
        $room_type = new RoomType;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_random(3).'_'.$image->getClientOriginalName();
            while (file_exists('public/images/room/'.$name)) {
                $name = str_random(3).'_'.$name;
            }
            $image->move('public/images/room'.$name);
            $room_type->image = $name;
        }
        $room_type->name = $request->name;
        $room_type->room_size = $request->room_size;
        $room_type->bed = $request->bed;
        $room_type->max_people = $request->max_people;
        $room_type->price = $request->price;
        $room_type->description = $request->description;
        //$room_type->facilities = $request->facilities;
//        $room_type = new RoomType(array(
//            'name' => $request -> get('name'),
//            'room_size' => $request -> get('room_size'),
//            'bed' => $request -> get('bed'),
//            'max_people' => $request -> get('max_people'),
//            'price' => $request -> get('price'),
//            'description' => $request -> get('description'),
//            'facilities' => $request -> get('facilities'),
//            'image' => $name
//        ));
        dd($room_type);
        $room_type->save();
        if ($request->has('facilities')) {
            foreach ($request->facilites as $facility) {
                $room_type->facilities()->attach($facility);
            }
        }
        return redirect()->route('room_type');
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
        $facility = Facility::whereid($id)->firstOrFail();
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
        $facility = Facility::whereid($id)->firstOrFail();
        $facility->name = $request->get('name');
        $facility->save();

        return redirect()->route('facility', $facility->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::whereid($id)->firstOrFail();
        $facility->delete();

        return redirect()->route('facility');
    }
}
