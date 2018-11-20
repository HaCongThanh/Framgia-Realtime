<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomTypesRequest;
use App\Http\Requests\RoomTypesEditRequest;
use App\Models\RoomType;
use App\Models\Facility;
use App\Models\Image;
use Validator;
use Entrust;
use DB;

class RoomTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'CheckAdmin']);
        $this->middleware('permission:view-room-types')->only(['index', 'getRoomTypes']);
        $this->middleware('permission:add-room-types')->only(['create', 'store']);
        $this->middleware('permission:detail-room-types')->only(['show']);
        $this->middleware('permission:edit-room-types')->only(['edit', 'update']);
        $this->middleware('permission:delete-room-types')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.room_types.index');
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

        $room_type->name = $request->name;
        $room_type->room_size = $request->room_size;
        $room_type->bed = $request->bed;
        $room_type->max_people = $request->max_people;
        $room_type->price = $request->price;
        $room_type->description = $request->description;

        $room_type->save();

        $images = $request->file('image');

        foreach ($images as $image) {
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();

            $new_name = $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $image->storeAs('images/rooms', $new_name);

            $image = new Image([
                'room_type_id' => $room_type->id,
                'filename' => $new_name,
            ]);

            $image->save();
        }

        foreach ($request->facilities as $facility) {
            $room_type->facilities()->attach($facility);
        }

        return redirect()->route('room-types.index');
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

        return view('admin.room_types.edit', compact('room_type', 'facilities', 'checkedFacility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypesEditRequest $request, $id)
    {
        $room_type = RoomType::findOrFail($id);

        $room_type->name = $request->name;
        $room_type->room_size = $request->room_size;
        $room_type->bed = $request->bed;
        $room_type->max_people = $request->max_people;
        $room_type->price = $request->price;
        $room_type->description = $request->description;

        $room_type->save();

        if ($request->hasFile('image')) {
            $images = $request->file('image');

            foreach ($images as $image) {
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();

                $new_name = $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $image->storeAs('images/rooms', $new_name);

                $image = new Image([
                    'room_type_id' => $room_type->id,
                    'filename' => $new_name,
                ]);

                $image->save();
            }
        }

        if ($request->has('facilities')) {
            $room_type->facilities()->detach();

            foreach ($request->facilities as $facility) {
                $room_type->facilities()->attach($facility);
            }
        } else {
            $room_type->facilities()->detach();
        }

        return redirect()->route('room-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            RoomType::where('id', $id)->delete();

            DB::commit();

            return response()->json([
                'error' => false,
                'message' => __('messages.success'),
            ]);
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'error' => true,
                'message' => __('messages.fail'),
            ]);
        }
    }

    /**
     * [getRoomTypes description]
     * @return [type] [description]
     */
    public function getRoomTypes()
    {
        $roomTypes = RoomType::orderBy('id', 'desc')->get();

        return Datatables::of($roomTypes)
            ->addIndexColumn()

            ->editColumn('room_size', function($roomType){
                $roomSize = $roomType->room_size . ' m2';

                return $roomSize;
            })

            ->editColumn('bed', function($roomType){
                $bed = $roomType->bed . __('messages.bed_count');

                return $bed;
            })

            ->editColumn('max_people', function($roomType){
                $maxPeople = $roomType->max_people . __('messages.people_count');

                return $maxPeople;
            })

            ->editColumn('price', function($roomType){
                $price = number_format($roomType->price) . ' VNĐ';

                return $price;
            })

            ->addColumn('action', function ($roomType) {
                if (Entrust::can(['detail-room-types'])) {
                    $detailRoomTypes = 1;
                } else {
                    $detailRoomTypes = 0;
                }

                if (Entrust::can(['edit-room-types'])) {
                    $editRoomTypes = 1;
                } else {
                    $editRoomTypes = 0;
                }

                if (Entrust::can(['delete-room-types'])) {
                    $deleteRoomTypes = 1;
                } else {
                    $deleteRoomTypes = 0;
                }

                return [
                    'detailRoomTypes' => $detailRoomTypes,
                    'editRoomTypes' => $editRoomTypes,
                    'deleteRoomTypes' => $deleteRoomTypes,
                    'roomTypeId' => $roomType->id,
                ];
            })

        ->make(true);
    }
}
