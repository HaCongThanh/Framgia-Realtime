<?php

namespace App\Http\Controllers\Admin;

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
        //$room_type = RoomType::all();
        return view('admin.rooms.lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room_types = RoomType::all();
        //dd($room_types);
        return view('admin.rooms.create', compact('room_types'));
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
        //dd($new_name);
        $room_type->name = $request->name;
        $room_type->room_size = $request->room_size;
        $room_type->bed = $request->bed;
        $room_type->max_people = $request->max_people;
        $room_type->price = $request->price;
        $room_type->description = $request->description;
        //dd($image, $room_type);
        //$image->save();
        $room_type->save();

        if($request->hasFile('image')) {
            $images = $request->file('image');
            foreach($images as $image) {
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();

                $new_name = $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $image->storeAs('public/images/rooms', $new_name);

                $image = new Imageupload([
                    'room_type_id' => $room_type->id,
                    'filename' => $new_name,
                ]);
                //dd($image, $room_type);
                $image->save();
            }
        }
        foreach ($request->facilities as $facility) {
            $room_type->facilities()->attach($facility);
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
        $room_type = RoomType::findOrFail($id);
        $facilities = Facility::all();
        $checkedFacility = $room_type->facilities->pluck('id')->toArray();
//        dd($facilities, $checkedFacility);
        return view('admin.room_types.edit', compact('room_type', 'facilities', 'checkedFacility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypesRequest $request, $id)
    {
        $room_type = RoomType::findOrFail($id);

        $room_type->name = $request->name;
        $room_type->room_size = $request->room_size;
        $room_type->bed = $request->bed;
        $room_type->max_people = $request->max_people;
        $room_type->price = $request->price;
        $room_type->description = $request->description;
        //dd($room_type);
        //$image->save();
        $room_type->save();

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();

                $new_name = $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $image->storeAs('public/images/rooms', $new_name);

                $image = new Imageupload([
                    'room_type_id' => $room_type->id,
                    'filename' => $new_name,
                ]);
                //dd($image, $room_type);
                $image->save();
            }
        }

        if ($request->has('facilities')) {
            $room_type->facilities()->detach();
            //dd($request->facilities);
            foreach ($request->facilities as $facility) {
                $room_type->facilities()->attach($facility);
            }
        } else {
            $room_type->facilities()->detach();
        }


        return redirect()->route('room_type', $room_type->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room_type = RoomType::findOrFail($id);
        $room_type->delete();

        return redirect()->route('room_type');
    }
}
