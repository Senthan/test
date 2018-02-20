<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\EventType;
use App\Examination;
use App\Patient;
use App\SurgicalFollowup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SurgicalFollowupStoreRequest;
use App\Http\Controllers\Controller;

class SurgicalFollowupController extends Controller
{

    public $motorExamination = [[]];
    public $painScaleExamination = [[]];
    public $sensoryImpairmentExamination = [[]];
    public $reflexesExamination = [[]];
    public function __construct()
    {
        $this->motorExamination =  [
            [0, 0, 'C5 Elbow extensors Grade0 R', 'C5 Elbow extensors Grade0 L', 'C5 Elbow extensors Grade1 R', 'C5 Elbow extensors Grade1 L', 'C5 Elbow extensors Grade2 R', 'C5 Elbow extensors Grade2 L', 'C5 Elbow extensors Grade3 R', 'C5 Elbow extensors Grade3 L', 'C5 Elbow extensors Grade4 R', 'C5 Elbow extensors Grade4 L', 'C5 Elbow extensors Grade5 R', 'C5 Elbow extensors Grade5 L'],
            [0, 0, 'C6 Wrist extensors Grade0 R', 'C6 Wrist extensors Grade0 L', 'C6 Wrist extensors Grade1 R', 'C6 Wrist extensors Grade1 L', 'C6 Wrist extensors Grade2 R', 'C6 Wrist extensors Grade2 L', 'C6 Wrist extensors Grade3 R', 'C6 Wrist extensors Grade3 L', 'C6 Wrist extensors Grade4 R', 'C6 Wrist extensors Grade4 L', 'C6 Wrist extensors Grade5 R', 'C6 Wrist extensors Grade5 L'],
            [0, 0, 'C8 Finger flexors Grade0 R', 'C8 Finger flexors Grade0 L', 'C8 Finger flexors Grade1 R', 'C8 Finger flexors Grade1 L', 'C8 Finger flexors Grade2 R', 'C8 Finger flexors Grade2 L', 'C8 Finger flexors Grade3 R', 'C8 Finger flexors Grade3 L', 'C8 Finger flexors Grade4 R', 'C8 Finger flexors Grade4 L', 'C8 Finger flexors Grade5 R', 'C8 Finger flexors Grade5 L'],
            [0, 0, 'L2 Hip flexors Grade0 R', 'L2 Hip flexors Grade0 L', 'L2 Hip flexors Grade1 R', 'L2 Hip flexors Grade1 L', 'L2 Hip flexors Grade2 R', 'L2 Hip flexors Grade2 L', 'L2 Hip flexors Grade3 R', 'L2 Hip flexors Grade3 L', 'L2 Hip flexors Grade4 R', 'L2 Hip flexors Grade4 L', 'L2 Hip flexors Grade5 R', 'L2 Hip flexors Grade5 L'],
            [0, 0, 'L3 Knee extensors Grade0 R', 'L3 Knee extensors Grade0 L', 'L3 Knee extensors Grade1 R', 'L3 Knee extensors Grade1 L', 'L3 Knee extensors Grade2 R', 'L3 Knee extensors Grade2 L', 'L3 Knee extensors Grade3 R', 'L3 Knee extensors Grade3 L', 'L3 Knee extensors Grade4 R', 'L3 Knee extensors Grade4 L', 'L3 Knee extensors Grade5 R', 'L3 Knee extensors Grade5 L'],
            [0, 0, 'L4 Ankle dorsiflexors Grade0 R', 'L4 Ankle dorsiflexors Grade0 L', 'L4 Ankle dorsiflexors Grade1 R', 'L4 Ankle dorsiflexors Grade1 L', 'L4 Ankle dorsiflexors Grade2 R', 'L4 Ankle dorsiflexors Grade2 L', 'L4 Ankle dorsiflexors Grade3 R', 'L4 Ankle dorsiflexors Grade3 L', 'L4 Ankle dorsiflexors Grade4 R', 'L4 Ankle dorsiflexors Grade4 L', 'L4 Ankle dorsiflexors Grade5 R', 'L4 Ankle dorsiflexors Grade5 L'],
            [0, 0, 'L5 Long toe extensors Grade0 R', 'L5 Long toe extensors Grade0 L', 'L5 Long toe extensors Grade1 R', 'L5 Long toe extensors Grade1 L', 'L5 Long toe extensors Grade2 R', 'L5 Long toe extensors Grade2 L', 'L5 Long toe extensors Grade3 R', 'L5 Long toe extensors Grade3 L', 'L5 Long toe extensors Grade4 R', 'L5 Long toe extensors Grade4 L', 'L5 Long toe extensors Grade5 R', 'L5 Long toe extensors Grade5 L'],
            [0, 0, 'S1 Ankle plantar flexors Grade0 R', 'S1 Ankle plantar flexors Grade0 L', 'S1 Ankle plantar flexors Grade1 R', 'S1 Ankle plantar flexors Grade1 L', 'S1 Ankle plantar flexors Grade2 R', 'S1 Ankle plantar flexors Grade2 L', 'S1 Ankle plantar flexors Grade3 R', 'S1 Ankle plantar flexors Grade3 L', 'S1 Ankle plantar flexors Grade4 R', 'S1 Ankle plantar flexors Grade4 L', 'S1 Ankle plantar flexors Grade5 R', 'S1 Ankle plantar flexors Grade5 L']
        ];

        $this->reflexesExamination =  [
            [0, 0],
            [0, 0, 'Biceps C5 Grade 0', 'Biceps C5 Grade 1', 'Biceps C5 Grade 2', 'Biceps C5 Grade 3', 'Biceps C5 Grade 4' ],
            [0, 0, 'Brachioradialis C6 Grade 0', 'Brachioradialis C6 Grade 1', 'Brachioradialis C6 Grade 2', 'Brachioradialis C6 Grade 3', 'Brachioradialis C6 Grade 4' ],
            [0, 0, 'Triceps C7 Grade 0', 'Triceps C7 Grade 1', 'Triceps C7 Grade 2', 'Triceps C7 Grade 3', 'Triceps C7 Grade 4' ],
            [0, 0, 'Fingers C8 Grade 0', 'Fingers C8 Grade 1', 'Fingers C8 Grade 2', 'Fingers C8 Grade 3', 'Fingers C8 Grade 4' ],
            [0, 0, 'Hoffman sign Grade 0', 'Hoffman sign Grade 1', 'Hoffman sign Grade 2', 'Hoffman sign Grade 3', 'Hoffman sign Grade 4' ],
            [0, 0, 'Knee L4 Grade 0', 'Knee L4 Grade 1', 'Knee L4 Grade 2', 'Knee L4 Grade 3', 'Knee L4 Grade 4' ],
            [0, 0, 'Ankle S1 Grade 0', 'Ankle S1 Grade 1', 'Ankle S1 Grade 2', 'Ankle S1 Grade 3', 'Ankle S1 Grade 4' ]
        ];

        $this->sensoryImpairmentExamination =  [
            [0, 'Cerrvical C1', 'Cerrvical C2', 'Cerrvical C3', 'Cerrvical C4', 'Cerrvical C5', 'Cerrvical C6', 'Cerrvical C7', 'Cerrvical C8'],
            [0, 'Thoracic T1', 'Thoracic T2', 'Thoracic T3', 'Thoracic T4', 'Thoracic T5', 'Thoracic T6', 'Thoracic T7', 'Thoracic T8', 'Thoracic T9', 'Thoracic T10', 'Thoracic T11', 'Thoracic T12'],
            [0, 'Lumbar L1', 'Lumbar L2', 'Lumbar L3', 'Lumbar L4', 'Lumbar L5'],
            [0, 'Sacral S1', 'Sacral S2', 'Sacral S3', 'Sacral S4', 'Sacral S5'],
            [0, 'Caccxygeal Cx']
        ];

        $this->painScaleExamination =  [
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
        ];


        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient)
    {
        $surgicalFollowup = $patient->surgicalFollowup;
        if (request()->ajax()) {
            return response()->json($surgicalFollowup);
        }

        return view('admin.patient.follow-up.surgical.index', compact('patient', 'surgicalFollowup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {
        return view('admin.patient.follow-up.surgical.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurgicalFollowupStoreRequest $request, Patient $patient)
    {
        $surgicalFollowup = new SurgicalFollowup();
        $surgicalFollowup->patient_id = $patient->id;
        $surgicalFollowup->date = $request->date;
        $surgicalFollowup->type = 'SurgicalFollowup';
        $surgicalFollowup->save();

        $this->updatePatientFollowup($surgicalFollowup);
//
//        $diagnosis = $patient->patient_diagnosis->first();
//        $refferred_from = $diagnosis->refferred_from ? $diagnosis->refferred_from : 'Surgical Followup';
//        $refferredFrom = '%'.$refferred_from.'%';
//        $eventType = EventType::where('name', 'like', $refferredFrom)->first();
//        if(!$eventType) {
//            $eventType = EventType::firstOrNew(['name' => $refferred_from]);
//            $eventType->save();
//        }
//        if($eventType) {
//            $event = Event::firstOrNew([
//                'event_type_id' => $eventType->id,
//                'all_day' => 'No',
//                'start' => $request->date,
//                'end' => $request->date,
//                'repeat' => 'No',
//                'repeat_every' => null,
//                'repeat_end' => null,
//                'where' => null,
//                'visibility' => 'Public'
//            ]);
//
//            $event->save();
//            $what = $event->what;
//            $what = $what && $what != '' ? $what :  $refferred_from. ' for ';
//            $what = $what. ' ' .$patient->patient_uuid;
//            $event->what = $what;
//            $event->save();
//            $fPatient = $event->patient()->find($patient->id);
//            if(!$fPatient) {
//                $event->patient()->attach([$patient->id]);
//            }
//        }

        return redirect()->route('surgical.followup.edit', ['patient' => $patient, 'surgicalFollowup' => $surgicalFollowup->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, SurgicalFollowup $surgicalFollowup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient, SurgicalFollowup $surgicalFollowup)
    {
        $examinations = $surgicalFollowup->examinationFollowups()->where('patient_id', $patient->id);
        $bath0 = $surgicalFollowup->examinationFollowups()->where('patient_id', $patient->id)->where('row', 10)->where('col', 1)->where('type', 'activities_examination_followup')->first();
        $surgicalFollowup->bath_0 = $bath0 ? $bath0->value : '-----';

        return view('admin.patient.follow-up.surgical.edit', compact('patient', 'surgicalFollowup', 'examinations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient, SurgicalFollowup $surgicalFollowup)
    {
        $surgicalFollowup->patient_id = $patient->id;
        $surgicalFollowup->date = $request->date;
        $surgicalFollowup->complain = $request->complain;
        $surgicalFollowup->examination = $request->examination;
        $surgicalFollowup->investigation = $request->investigation;
        $surgicalFollowup->management = $request->management;
        $surgicalFollowup->post_up_days = $request->post_up_days;
        $surgicalFollowup->post_up_weeks = $request->post_up_weeks;
        $surgicalFollowup->post_up_months = $request->post_up_months;
        $surgicalFollowup->type = 'SurgicalFollowup';
        $surgicalFollowup->save();

        $this->updatePatientFollowup($surgicalFollowup);


//        $diagnosis = $patient->patient_diagnosis->first();
//        $refferred_from = $diagnosis->refferred_from ? $diagnosis->refferred_from : 'Surgical Followup';
//        $refferredFrom = '%'.$refferred_from.'%';
//        $eventType = EventType::where('name', 'like', $refferredFrom)->first();
//        if(!$eventType) {
//            $eventType = EventType::firstOrNew(['name' => $refferred_from]);
//            $eventType->save();
//        }
//        if($eventType) {
//            $event = Event::firstOrNew([
//                'event_type_id' => $eventType->id,
//                'all_day' => 'No',
//                'start' => $request->date,
//                'end' => $request->date,
//                'repeat' => 'No',
//                'repeat_every' => null,
//                'repeat_end' => null,
//                'where' => null,
//                'visibility' => 'Public'
//            ]);
//
//            $event->save();
//            $what = $event->what;
//            $what = $what && $what != '' ? $what :  $refferred_from. ' for ';
//            $what = $what. ' ' .$patient->patient_uuid;
//            $event->what = $what;
//            $event->save();
//            $fPatient = $event->patient()->find($patient->id);
//            if(!$fPatient) {
//                $event->patient()->attach([$patient->id]);
//            }
//        }

        return redirect()->route('surgical.followup.index', ['patient' => $patient]);
    }

    public function delete(Patient $patient, SurgicalFollowup $surgicalFollowup)
    {
        return view('admin.patient.follow-up.surgical.delete', compact('patient', 'surgicalFollowup'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient, SurgicalFollowup $surgicalFollowup)
    {
        $surgicalFollowup->delete();
        return redirect()->route('surgical.followup.index', ['patient' => $patient])->with('message', 'Surgical was successfully deleted!');
    }

    public function followup(Patient $patient, SurgicalFollowup $surgicalFollowup)
    {
        $data = request()->all();
        $createExamination = $surgicalFollowup->examinationFollowup()->where('type', $data['data']['type'])->where('row', $data['data']['row'])->where('col', $data['data']['col'])->first();
        if (isset($data['data'])) {
            if ($createExamination) {
                $createExamination->value = $data['data']['value'];
                $createExamination->save();
            } else {
                $examination = new Examination();
                $examination->patient_id = $patient->id;
                $examination->surgical_followup_id = $surgicalFollowup->id;
                $examination->row = $data['data']['row'];
                $examination->col = $data['data']['col'];
                $examination->value = $data['data']['value'];
                $examination->type = $data['data']['type'];
                $examination->save();
            }
        }
    }

    private function updatePatientFollowup(SurgicalFollowup $surgicalFollowup)
    {
        $examinations = $surgicalFollowup->examinationFollowups()->where('value', 1)->get();
        $rootExaminationFollowups = $examinations->where('type', 'root_examination_followup');
        $rootExaminationFollowups = $rootExaminationFollowups->map(function ($item) {
            $item->motor_examination = isset($this->motorExamination[$item->row][$item->col]) ? $this->motorExamination[$item->row][$item->col] : '';
            return $item;
        })->pluck('motor_examination')->toArray();

        $rootExaminationFollowups = implode(" ", $rootExaminationFollowups);
        $surgicalFollowup->motor_examination = $rootExaminationFollowups;

        $sensory = $examinations->where('type', 'sensory_impairment_followup');
        $sensory = $sensory->map(function ($item) {
            $item->sensory = isset($this->sensoryImpairmentExamination[$item->row][$item->col]) ? $this->sensoryImpairmentExamination[$item->row][$item->col] : '';
            return $item;
        })->pluck('sensory')->toArray();

        $sensory = implode(" ", $sensory);
        $surgicalFollowup->sensory = $sensory;

        $pain = $examinations->where('type', 'pain_scale_followup');
        $pain = $pain->map(function ($item) {
            $item->pain = isset($this->painScaleExamination[$item->row][$item->col]) ? $this->painScaleExamination[$item->row][$item->col] : '';
            return $item;
        })->pluck('pain')->toArray();

        $pain = implode(" ", $pain);
        $surgicalFollowup->pain = $pain;


        $bath0 = $surgicalFollowup->examinationFollowups()->where('row', 10)->where('col', 1)->where('type', 'activities_examination_followup')->first();
        $bath_0 = $bath0 ? $bath0->value : '-----';
        $surgicalFollowup->activities_of_daily_living = $bath_0;

        $surgicalFollowup->save();

    }
}
