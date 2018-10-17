<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.lists', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room_types = RoomType::all()->pluck('name', 'id');
        //dd($room_types);
        return view('admin.rooms.create', compact('room_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $rooms = new Room;

        $rooms->floor = $request->floor;
        $rooms->room_type_id = $request->room_type;
        //dd($room);
        $rooms->save();

        return redirect()->route('room');
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
        $rooms = Room::findOrFail($id);

        $room_types = RoomType::all()->pluck('name', 'id');

        $selectedTypes = $rooms->room_types->id;
        //dd($rooms->room_types->id);
        return view('admin.rooms.edit', compact('rooms', 'room_types', 'selectedTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rooms = Room::findOrFail($id);
        $rooms->save();
        $rooms->room_types()->associate($request->get('room_type'));

        return redirect()->route('room', $rooms->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rooms = Room::findOrFail($id);
        $rooms->delete();

        return redirect()->route('room');
    }
}
