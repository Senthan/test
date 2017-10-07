<?php

namespace App\Http\Controllers\Admin;

use App\Patient;
use App\Refferal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\RefferalStoreRequest;
class RefferalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient)
    {
        if (request()->ajax()) {
            $refferal = $patient->refferal;
            return response()->json($refferal);
        }

        return view('admin.patient.refferal.index', compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Patient $patient)
    {
        return view('admin.patient.refferal.create', compact('patient'));
    }

    public function store(RefferalStoreRequest $request, Patient $patient)
    {
        $refferal = new Refferal();
        $refferal->patient_id = $patient->id;
        $refferal->refferal = $request->refferal;
        $refferal->reffered_to = $request->reffered_to;
        $refferal->report = $request->report;
        $refferal->save();

        return redirect()->route('refferal.index', ['patient' => $patient]);
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
    public function edit(Patient $patient, Refferal $refferal)
    {
        return view('admin.patient.refferal.edit', compact('patient', 'refferal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient, Refferal $refferal)
    {
        $refferal->patient_id = $patient->id;
        $refferal->refferal = $request->refferal;
        $refferal->reffered_to = $request->reffered_to;
        $refferal->report = $request->report;
        $refferal->save();

        return redirect()->route('refferal.index', ['patient' => $patient]);
    }

    public function delete(Patient $patient, Refferal $refferal)
    {
        return view('admin.patient.refferal.delete', compact('patient', 'refferal'));
    }

    public function destroy(Patient $patient, Refferal $refferal)
    {
        $refferal->delete();
        return redirect()->route('refferal.index', ['patient' => $patient])->with('message', 'Refferal was successfully deleted!');

    }
}
