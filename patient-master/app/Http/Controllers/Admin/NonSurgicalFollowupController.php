<?php

namespace App\Http\Controllers\Admin;

use App\NonSurgicalFollowup;
use App\Patient;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NonSurgicalFollowupStoreRequest;
use App\Http\Controllers\Controller;

class NonSurgicalFollowupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient)
    {
        $nonSurgicalFollowup = $patient->nonSurgicalFollowup;
        if (request()->ajax()) {
            return response()->json($nonSurgicalFollowup);
        }

        return view('admin.patient.follow-up.non-surgical.index', compact('patient', 'nonSurgicalFollowup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {
        return view('admin.patient.follow-up.non-surgical.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NonSurgicalFollowupStoreRequest $request, Patient $patient)
    {
        $nonSurgicalFollowup = new NonSurgicalFollowup();
        $nonSurgicalFollowup->patient_id = $patient->id;
        $nonSurgicalFollowup->date = $request->date;
        $nonSurgicalFollowup->complain = $request->complain;
        $nonSurgicalFollowup->examination = $request->examination;
        $nonSurgicalFollowup->investigation = $request->investigation;
        $nonSurgicalFollowup->management = $request->management;
        $nonSurgicalFollowup->type = 'NonSurgicalFollowup';
        $nonSurgicalFollowup->save();

        return redirect()->route('non.surgical.followup.index', ['patient' => $patient]);
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
    public function edit(Patient $patient, NonSurgicalFollowup $nonSurgicalFollowup)
    {
        return view('admin.patient.follow-up.non-surgical.edit', compact('patient', 'nonSurgicalFollowup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient, NonSurgicalFollowup $nonSurgicalFollowup)
    {
        $nonSurgicalFollowup->patient_id = $patient->id;
        $nonSurgicalFollowup->date = $request->date;
        $nonSurgicalFollowup->complain = $request->complain;
        $nonSurgicalFollowup->examination = $request->examination;
        $nonSurgicalFollowup->investigation = $request->investigation;
        $nonSurgicalFollowup->management = $request->management;
        $nonSurgicalFollowup->type = 'NonSurgicalFollowup';
        $nonSurgicalFollowup->save();

        return redirect()->route('non.surgical.followup.index', ['patient' => $patient]);
    }

    public function delete(Patient $patient, NonSurgicalFollowup $nonSurgicalFollowup)
    {
        return view('admin.patient.follow-up.non-surgical.delete', compact('patient', 'nonSurgicalFollowup'));
    }

    public function destroy(Patient $patient, NonSurgicalFollowup $nonSurgicalFollowup)
    {
        $nonSurgicalFollowup->delete();
        return redirect()->route('non.surgical.index', ['patient' => $patient])->with('message', 'nonSurgicalFollowup was successfully deleted!');
    }
}
