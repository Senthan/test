<?php

namespace App\Http\Controllers\Admin;

use App\Patient;
use App\Surgical;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SurgicalStoreRequest;
class SurgicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient)
    {
        if (request()->ajax()) {
            $nonSurgical = $patient->surgical;
            return response()->json($nonSurgical);
        }

        return view('admin.patient.surgical.index', compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Patient $patient)
    {
        return view('admin.patient.surgical.create', compact('patient'));
    }

    public function store(SurgicalStoreRequest $request, Patient $patient)
    {
        $surgical = new Surgical();
        $surgical->patient_id = $patient->id;
        $surgical->date_of_admission = $request->date_of_admission;
        $surgical->date_of_surgery = $request->date_of_surgery;
        $surgical->date_of_discharge = $request->date_of_discharge;
        $surgical->operative_notes = $request->operative_notes;
        $surgical->traneximic = $request->traneximic;
        $surgical->methlene = $request->methlene;
        $surgical->surgery = $request->surgery;
        $surgical->complication = $request->complication;
        $surgical->discharge_plan = $request->discharge_plan;
        $surgical->save();

        return redirect()->route('surgical.index', ['patient' => $patient]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, Surgical $surgical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient, Surgical $surgical)
    {
        return view('admin.patient.surgical.edit', compact('patient', 'surgical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient, Surgical $surgical)
    {
        $surgical->patient_id = $patient->id;
        $surgical->date_of_admission = $request->date_of_admission;
        $surgical->date_of_surgery = $request->date_of_surgery;
        $surgical->date_of_discharge = $request->date_of_discharge;
        $surgical->operative_notes = $request->operative_notes;
        $surgical->traneximic = $request->traneximic;
        $surgical->methlene = $request->methlene;
        $surgical->surgery = $request->surgery;
        $surgical->complication = $request->complication;
        $surgical->discharge_plan = $request->discharge_plan;
        $surgical->save();

        return redirect()->route('surgical.index', ['patient' => $patient]);
    }

    public function delete(Patient $patient, Surgical $surgical)
    {
        return view('admin.patient.surgical.delete', compact('patient', 'surgical'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient, Surgical $surgical)
    {
        $surgical->delete();
        return redirect()->route('surgical.index', ['patient' => $patient])->with('message', 'Surgical was successfully deleted!');
    }
}
