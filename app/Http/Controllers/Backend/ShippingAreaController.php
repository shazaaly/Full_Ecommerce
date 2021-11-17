<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShippingState;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingAreaController extends Controller
{
    //
    public function DivisionView()
    {
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();

        return view('backend.division.division_view', compact('divisions'));
    }

    public function DivisionStore(Request $request)
    {

        $request->validate([
            'division_name' => 'required',

        ]);


        ShipDivision::insert([
            'division_name' => $request->division_name,

            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Shipping Division added successfully',
            'type' => 'success',

        );

        return redirect()->back()->with($notification);

    }

    public function DivisionEdit($id)
    {

        $division = ShipDivision::findOrFail($id);
        return view('backend.division.division_edit', compact('division'));

    }

    public function DivisionUpdate(Request $request, $id)
    {

        $request->validate([
            'division_name' => 'required',
        ]);


        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division Updated successfully',
            'type' => 'info',

        );
        return redirect()->route('manage_division')->with($notification);

    }

    public function DivisionDelete($id)
    {
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Deleted Successfully',
            'type' => 'info',

        );
        return redirect()->route('manage_division')->with($notification);


    }

    public function DistrictView()
    {
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();

        $districts = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();

        return view('backend.districts.districts_view', compact('districts', 'divisions'));
    }

    public function DistrictStore(Request $request)
    {

        $request->validate([
            'district_name' => 'required',
            'division_id' => 'required',

        ]);


        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,

            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Shipping District added successfully',
            'type' => 'success',

        );

        return redirect()->back()->with($notification);

    }

    public function DistrictEdit($id)
    {
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        $district = ShipDistrict::with('division')->findOrFail($id);

        return view('backend.districts.district_edit', compact('district', 'divisions'));

    }

    public function DistrictUpdate(Request $request, $id)
    {
//        return $request;
        $district = ShipDistrict::findOrFail($id);
        $district->update($request->all());
        $district->save();


//        ShipDistrict::findOrFail($id)->update([
//
//            'division_id' => $request->division_id,
//            'district_name' => $request->district_name,
//            'created_at' => Carbon::now(),
//
//        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage_district')->with($notification);


    } // end method

    public function DistrictDelete($id)
    {
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District Deleted Successfully',
            'type' => 'info',

        );
        return redirect()->route('manage_division')->with($notification);


    }

    public function StateView()
    {
        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShipDistrict::with('division')->orderBy('district_name', 'ASC')->get();
        $states = ShippingState::with('division', 'district')->orderBy('id', 'DESC')->get();
        return view('backend.states.state_view', compact('divisions', 'districts', 'states'));
    }

//    ajax get district:
    public function GetDistrict($division_id)
    {
        $district = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
//        pass data with json format to match jq code condition in view:
        return json_encode($district);

    }

    //    ajax get State:


    public function GetState($district_id)
    {

        $state = ShippingState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($state);
    }

    public function StateStore(Request $request)
    {
//        return $request;

        $request->validate([
            'state_name' => 'required',
        ]);

        try {
            ShippingState::insert([
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'state_name' => $request->state_name,
                'created_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Shipping State added successfully',
                'type' => 'success',

            );
            return redirect()->back()->with($notification);


        } catch (\Exception $exception) {

            return $exception;
        }

    }

//    edit update delete State start:

    public function StatetEdit($id)
    {
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        $districts = ShipDistrict::with('division')->get();
        $state = ShippingState::with('division', 'district')->findOrFail($id);

        return view('backend.states.state_edit', compact('districts', 'divisions', 'state'));

    }

    public function StateUpdate(Request $request, $id)
    {
//        return $request;
        ShippingState::findOrFail($id)->update([

            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage_state')->with($notification);


    } // end method

    public function StateDelete($id)
    {
        ShippingState::findOrFail($id)->delete();
        $notification = array(
            'message' => 'State Deleted Successfully',
            'type' => 'info',

        );
        return redirect()->route('manage_state')->with($notification);


    }


}
