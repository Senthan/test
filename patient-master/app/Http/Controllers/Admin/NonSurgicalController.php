<?php

namespace App\Http\Controllers\Admin;

use App\NonSurgical;
use App\Patient;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\NonSurgicalStoreRequest;
class NonSurgicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient)
    {
        if (request()->ajax()) {
            $nonSurgical = $patient->nonSurgical;
            return response()->json($nonSurgical);
        }

        return view('admin.patient.non-surgical.index', compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Patient $patient)
    {
        return view('admin.patient.non-surgical.create', compact('patient'));
    }

    public function store(NonSurgicalStoreRequest $request, Patient $patient)
    {
        $nonSurgical = new NonSurgical();
        $nonSurgical->patient_id = $patient->id;
        $nonSurgical->date_of_admission = $request->date_of_admission;
        $nonSurgical->date_of_discharge = $request->date_of_discharge;
        $nonSurgical->indication_admission = $request->indication_admission;
        $nonSurgical->investigation = $request->investigation;
        $nonSurgical->management = $request->management;
        $nonSurgical->save();

        return redirect()->route('non.surgical.index', ['patient' => $patient]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient, NonSurgical $nonSurgical)
    {
        return view('admin.patient.non-surgical.edit', compact('patient', 'nonSurgical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient, NonSurgical $nonSurgical)
    {
        $nonSurgical->patient_id = $patient->id;
        $nonSurgical->date_of_admission = $request->date_of_admission;
        $nonSurgical->date_of_discharge = $request->date_of_discharge;
        $nonSurgical->indication_admission = $request->indication_admission;
        $nonSurgical->investigation = $request->investigation;
        $nonSurgical->management = $request->management;
        $nonSurgical->save();

        return redirect()->route('non.surgical.index', ['patient' => $patient]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Patient $patient, NonSurgical $nonSurgical)
    {
        return view('admin.patient.non-surgical.delete', compact('patient', 'nonSurgical'));
    }

    public function destroy(Patient $patient, NonSurgical $nonSurgical)
    {
        $nonSurgical->delete();
        return redirect()->route('non.surgical.index', ['patient' => $patient])->with('message', 'Surgical was successfully deleted!');
    }
}
