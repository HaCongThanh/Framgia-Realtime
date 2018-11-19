<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\Facility;
use Validator;
use Entrust;
use DB;

class FacilityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'CheckAdmin']);
        $this->middleware('permission:view-facilities')->only(['index', 'getFacilities']);
        $this->middleware('permission:add-facilities')->only(['create', 'store']);
        $this->middleware('permission:detail-facilities')->only(['show']);
        $this->middleware('permission:edit-facilities')->only(['edit', 'update']);
        $this->middleware('permission:delete-facilities')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.facilities.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'name' => 'required|unique:facilities',
            ];

            $messages = [
                'name.required' => __('messages.facility') . __('messages.required'),
                'name.unique' => __('messages.facility') . __('messages.unique'),
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'valid',
                    'message' => $validator->errors(),
                ]);
            } else {
                Facility::create([
                    'name' => $request->name,
                ]);

                DB::commit();

                return response()->json([
                    'error' => false,
                    'message' => __('messages.success'),
                ]);
            }
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'error' => true,
                'message' => __('messages.fail'),
            ]);
        }
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
        DB::beginTransaction();

        try {
            $facility = Facility::findOrFail($id);

            DB::commit();

            return response()->json([
                'error' => false,
                'message' => __('messages.success'),
                'facility' => $facility,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            $rules = [
                'name' => 'required|unique:facilities',
            ];

            $messages = [
                'name.required' => __('messages.facility') . __('messages.required'),
                'name.unique' => __('messages.facility') . __('messages.unique'),
            ];

            $validator = Validator::make($data, $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'valid',
                    'message' => $validator->errors(),
                ]);
            } else {
                Facility::where('id', $id)->update([
                    'name' => $request->name,
                ]);

                DB::commit();

                return response()->json([
                    'error' => false,
                    'message' => __('messages.success'),
                ]);
            }
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'error' => true,
                'message' => __('messages.fail'),
            ]);
        }
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
            DB::table('facilities')->where('id', $id)->delete();

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
     * [getFacilities description]
     * @return [type] [description]
     */
    public function getFacilities()
    {
        $facilities = Facility::orderBy('id', 'desc')->get();

        return Datatables::of($facilities)
            ->addIndexColumn()

            ->addColumn('action', function ($facility) {
                if (Entrust::can(['edit-facilities'])) {
                    $editFacilities = 1;
                } else {
                    $editFacilities = 0;
                }

                if (Entrust::can(['delete-facilities'])) {
                    $deleteFacilities = 1;
                } else {
                    $deleteFacilities = 0;
                }

                return [
                    'editFacilities' => $editFacilities,
                    'deleteFacilities' => $deleteFacilities,
                    'facilityId' => $facility->id,
                ];
            })

        ->make(true);
    }
}
