<?php

namespace App\Http\Controllers\Admin;

use App\Anaesthetic;
use App\Designation;
use App\Diagnosis;
use App\Drug;
use App\Events\SendMail;
use App\Examination;
use App\FollowUpPlan;
use App\InvestigationBioChemistry;
use App\InvestigationBloodTest;
use Maatwebsite\Excel\Facades\Excel;
use App\InvestigationCtScan;
use App\InvestigationCxr;
use App\InvestigationHematology;
use App\InvestigationMicroBiology;
use App\InvestigationUltraSoundScan;
use App\InvestigationUrineTest;
use App\NonSurgical;
use App\PathologyReport;
use App\Patient;
use App\PatientSurgeryType;
use App\Profile;
use App\Refferal;
use App\Staff;
use App\SurgeryType;
use App\Surgical;
use App\TreatmentTemplate;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\AddDiagnosisStoreRequest;
use App\Http\Requests\PatientProfileUpdateRequest;
use App\Http\Requests\PatientUUIDStoreRequest;
use App\Http\Requests\NonSurgicalStoreRequest;
use App\Http\Requests\SurgicalStoreRequest;
use App\Http\Requests\RefferalStoreRequest;


use App\Transformers\PatientTransformer;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\App;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;
use Barryvdh\DomPDF\Facade as PDF;
class PatientController extends Controller
{
    public $motorExamination = [[]];
    public $painScaleExamination = [[]];
    public $sensoryImpairmentExamination = [[]];
    public $reflexesExamination = [[]];
    public function __construct(Request $request, ResponseFactory $response)
    {
        $this->request =  $request;
        $this->response =  $response;

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
            [0, 0],
            [0, 0, 'Biceps C5 Grade 0 R', 'Biceps C5 Grade 0 L', 'Biceps C5 Grade 1 R', 'Biceps C5 Grade 1 L', 'Biceps C5 Grade 2 R', 'Biceps C5 Grade 2 L', 'Biceps C5 Grade 3 R','Biceps C5 Grade 3 L', 'Biceps C5 Grade 4 R', 'Biceps C5 Grade 4 L' ],
            [0, 0, 'Brachioradialis C6 Grade 0 R', 'Brachioradialis C6 Grade 0 L', 'Brachioradialis C6 Grade 1 R', 'Brachioradialis C6 Grade 1 L', 'Brachioradialis C6 Grade 2 R','Brachioradialis C6 Grade 2 L', 'Brachioradialis C6 Grade 3 R','Brachioradialis C6 Grade 3 L', 'Brachioradialis C6 Grade 4 R', 'Brachioradialis C6 Grade 4 L' ],
            [0, 0, 'Triceps C7 Grade 0 R','Triceps C7 Grade 0 L', 'Triceps C7 Grade 1 R','Triceps C7 Grade 1 L', 'Triceps C7 Grade 2 R','Triceps C7 Grade 2 L', 'Triceps C7 Grade 3 R','Triceps C7 Grade 3 L', 'Triceps C7 Grade 4 R', 'Triceps C7 Grade 4 L' ],
            [0, 0, 'Fingers C8 Grade 0 R','Fingers C8 Grade 0 L', 'Fingers C8 Grade 1 R','Fingers C8 Grade 1 L', 'Fingers C8 Grade 2 R', 'Fingers C8 Grade 2 L', 'Fingers C8 Grade 3 R', 'Fingers C8 Grade 3 L', 'Fingers C8 Grade 4 R', 'Fingers C8 Grade 4 L' ],
            [0, 0, 'Hoffman sign Grade 0 R','Hoffman sign Grade 0 L', 'Hoffman sign Grade 1 R','Hoffman sign Grade 1 L', 'Hoffman sign Grade 2 R','Hoffman sign Grade 2 L', 'Hoffman sign Grade 3 R','Hoffman sign Grade 3 L', 'Hoffman sign Grade 4 R', 'Hoffman sign Grade 4 L' ],
            [0, 0, 'Knee L4 Grade 0 R', 'Knee L4 Grade 0 L', 'Knee L4 Grade 1 R','Knee L4 Grade 1 L', 'Knee L4 Grade 2 R','Knee L4 Grade 2 L', 'Knee L4 Grade 3 R','Knee L4 Grade 3 L', 'Knee L4 Grade 4 R', 'Knee L4 Grade 4 L' ],
            [0, 0, 'Ankle S1 Grade 0 R','Ankle S1 Grade 0 L', 'Ankle S1 Grade 1 R','Ankle S1 Grade 1 L', 'Ankle S1 Grade 2 R','Ankle S1 Grade 2 L', 'Ankle S1 Grade 3 R','Ankle S1 Grade 3 L', 'Ankle S1 Grade 4 R', 'Ankle S1 Grade 4 L' ]
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

    public function index()
    {
//        $diagnosisTypes = collect(['Inguinal Herniotomy', 'Appendisectomy', 'Hydrocelectomy', 'PPV Ligation', 'Mastectony', 'Thyroidectony',
//            'Vericose Vein Surgery', 'Carpal tunnel syndrome', 'Hemicolectomy', 'Oeoophagectomy', 'Parotidectomy', 'Gastrectomy', 'Umblical Hernia repair',
//            'Epigastric Hernia', 'Haemarrhoidectomy', 'Fistulectomy', 'Lateral Anal Sphincterotomy', 'Amphutation',
//            'Tendon Repair'
//        ]);
        $diagnosisTypes = SurgeryType::all()->lists('name', 'id');
//        if (request()->ajax()) {
//            $patient = Patient::with('diagnosis')->get();
//            $resource = new Collection($patient, new PatientTransformer());
//            $manager = new Manager();
//            $manager->setSerializer(new DataArraySerializer());
//
//            return $manager->createData($resource)->toArray();
//        }


        if (request()->ajax()) {
            $patient = Patient::with('diagnosis', 'examinations', 'surgicalFollowup',
                'nonSurgicalFollowup', 'surgical')->get()->sortByDesc('created_at')->values();
            return response()->json($patient);
        }

        return view('admin.patient.index', compact('diagnosisTypes'));
    }

    public function create()
    {
        return view('admin.patient.create');
    }

    public function store(PatientStoreRequest $request)
    {
        $patient = Patient::create($request->only(['patient_uuid', 'name', 'email', 'phone', 'nic_no', 'age', 'address']));
        return redirect()->route('patient.index');
    }

    public function update()
    {
        $patient = Patient::find(request()->id);
        $patient->update([request()->field_name => request()->new_value]);
    }
    /**
     * @param Patient $patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete(Patient $patient)
    {
        return view('admin.patient.delete', compact('patient'));
    }

    /**
     * @param Patient $patient
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Patient $patient)
    {
        $diagnosis = Diagnosis::find($patient->diagnosis_id);
        if(isset($diagnosis)) {
            $diagnosis->delete();
        }
        $patient->delete();
        return redirect()->route('patient.index')->with('message', 'Patient was successfully deleted!');
    }

    /**
     * @param Patient $patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Patient $patient)
    {
        $examination = $patient->examination;

        $bath0 = $patient->examination()->where('row', 10)->where('col', 1)->where('type', 'activities_examination')->first();
        $bath_0 = $bath0 ? $bath0->value : '-----';
        $motorExamination = $this->motorExamination;
        $painScaleExamination = $this->painScaleExamination;
        $sensoryImpairmentExamination = $this->sensoryImpairmentExamination;
        $reflexesExamination = $this->reflexesExamination;
        return view('admin.patient.show', compact('patient', 'examination', 'bath_0',
            'motorExamination', 'painScaleExamination', 'sensoryImpairmentExamination', 'reflexesExamination'));
    }

    public function addDiagnosis(Patient $patient)
    {

        if ($diagnosis = $patient->diagnosis()->first()) {
            return redirect()->route('patient.exist.diagnosis', ['patient' => $patient, 'diagnosis' => $diagnosis]);
        }

        $consultants = (Designation::where('name', 'LIKE', '%Surgeon%')->first()) ? Staff::whereIn('designation_id', Designation::where('name', 'LIKE', '%Surgeon%')->lists('id')->toArray())->get()->lists('short_name', 'id') : [];
//        $consultants = ['Consultant Name' ,'Dr.S.T.Sharma', 'Dr.S.GobiShankar', 'Dr.S.Rajendra', 'Dr.S.Raviraj', 'Dr.T.Ambalavanan'];
        $diagnosis = Diagnosis::find($patient->diagnosis_id);
//        $diagnosisTypes = ['Inguinal Herniotomy', 'Appendisectomy', 'Hydrocelectomy', 'PPV Ligation', 'Mastectony', 'Thyroidectony',
//        'Vericose Vein Surgery', 'Carpal tunnel syndrome', 'Hemicolectomy', 'Oeoophagectomy', 'Parotidectomy', 'Gastrectomy', 'Umblical Hernia repair',
//            'Epigastric Hernia', 'Haemarrhoidectomy', 'Fistulectomy', 'Lateral Anal Sphincterotomy', 'Amphutation',
//            'Tendon Repair'
//        ];
        $drugs = Drug::lists('name', 'id');
        $doses = Drug::with('dose')->get();
        $diagnosisTypeNames = SurgeryType::all();
        $diagnosisTypes = SurgeryType::with('treatmentTemplate')->get();
        return view('admin.patient.diagnosis.create', compact('drugs', 'doses', 'patient', 'consultants','diagnosis', 'diagnosisTypes', 'diagnosisTypeNames'));
    }

    public function addNonSurgical(Patient $patient)
    {
        return view('admin.patient.non-surgical.create', compact('patient'));
    }

    public function saveNonSurgical(NonSurgicalStoreRequest $request, Patient $patient)
    {
        $nonSurgical = new NonSurgical();
        $nonSurgical->patient_id = $patient->id;
        $nonSurgical->date_of_admission = $request->date_of_admission;
        $nonSurgical->date_of_discharge = $request->date_of_discharge;
        $nonSurgical->indication_admission = $request->indication_admission;
        $nonSurgical->management = $request->management;
        $nonSurgical->save();

        return redirect()->route('patient.index');
    }


    public function addSurgical(Patient $patient)
    {
        return view('admin.patient.surgical.create', compact('patient'));
    }

    public function saveSurgical(SurgicalStoreRequest $request, Patient $patient)
    {
        $surgical = new Surgical();
        $surgical->patient_id = $patient->id;
        $surgical->date_of_admission = $request->date_of_admission;
        $surgical->date_of_surgery = $request->date_of_surgery;
        $surgical->date_of_discharge = $request->date_of_discharge;
        $surgical->surgery = $request->surgery;
        $surgical->operative_notes = $request->operative_notes;
        $surgical->complication = $request->complication;
        $surgical->discharge_plan = $request->discharge_plan;
        $surgical->save();

        return redirect()->route('patient.index');
    }

    public function addRefferal(Patient $patient)
    {
        return view('admin.patient.refferal.create', compact('patient'));
    }

    public function saveRefferal(RefferalStoreRequest $request, Patient $patient)
    {
        $refferal = new Refferal();
        $refferal->patient_id = $patient->id;
        $refferal->refferal = $request->refferal;
        $refferal->reffered_to = $request->reffered_to;
        $refferal->report = $request->report;
        $refferal->save();

        return redirect()->route('patient.index');
    }


    public function storeDiagnosis(AddDiagnosisStoreRequest $request, Patient $patient)
    {
        $diagnosis = new Diagnosis();
        $diagnosis->co_mobidities = $request->co_mobidities;
        $diagnosis->drugs_on = $request->drugs_on;
        $diagnosis->height = $request->height;
        $diagnosis->weight = $request->weight;
        $weight = floatval($request->weight);
        $height = floatval($request->height);
        $bmi = $weight && $height ? floatval($weight) * 100 *100 / ($height * $height) : '';
        $diagnosis->bmi = round($bmi, 2);
        $diagnosis->date = $request->date;
        $diagnosis->staff_id = $request->staff_id;
        $diagnosis->refferred_from = $request->refferred_from;
        $diagnosis->presenting_complain = $request->presenting_complain;
        $diagnosis->past_surgical_history = $request->past_surgical_history;
        $diagnosis->allergic_history = $request->allergic_history;
        $diagnosis->diagnosis = $request->diagnosis;
        $diagnosis->management_plan = $request->management_plan;
        $diagnosis->surgical_management = $request->surgical_management;
        $diagnosis->non_surgical_management = $request->non_surgical_management;
        $diagnosis->drugs_given = $request->drugs_given;
        $diagnosis->x_ray = $request->x_ray;
        $diagnosis->ct_scan = $request->ct_scan;
        $diagnosis->miri_scan = $request->miri_scan;
        $diagnosis->other_imaging = $request->other_imaging;
        $diagnosis->en_treatment_template = $request->en_treatment_template;
        $diagnosis->ta_treatment_template = $request->ta_treatment_template;
        $diagnosis->si_treatment_template = $request->si_treatment_template;
        $diagnosis->save();

        $patient->diagnosis = 'active';
        $patient->save();
        $data[$request->surgery_type_id] = ['diagnosis_id' => $diagnosis->id];
        $patient->surgeryType()->attach($data);

        $diagnosis->save();

        $this->updatePatientFollowup($patient);

        return redirect()->route('patient.index');
    }


    public function pdf(Patient $patient) {
        $data['name'] = $patient->name;
        $data['age'] = $patient->age;
        $pdf = PDF::loadView('admin.pdf.patient-history', compact('data'));
        return $pdf->download('patient.pdf');
    }

    public function uuid(PatientUUIDStoreRequest $request) {
        $monthDays = [0, 31, 60, 91, 121, 152, 182, 213, 244, 274, 305, 335];
        $days = '';
        if($request->type == 'nic_no_have_not') {
            $checkDigit = $request->check_digit;
            $date  = Carbon::createFromFormat('Y-m-d',$request->date_of_birth);
            $result = preg_replace("/[^a-zA-Z]/", "", $request->address);
            $hashids = new Hashids($result);
            $registerNo = $hashids->encode(1, 2, 3);
            $registerNo = crc32($registerNo) % 999;
            $registerNo = str_pad($registerNo, 3, "0", STR_PAD_LEFT);
            $yourRegNo = (isset($result) && $result == "") ? preg_replace("/[^1-9]/", "", $request->address) : $registerNo;
            $registerNo = (isset($yourRegNo) && $yourRegNo == "") ? $registerNo : $yourRegNo;
            if($date && $date->month) {
                $day = $monthDays[$date->month - 1] + $date->day;
                $day = str_pad($day, 3, "0", STR_PAD_LEFT);
                $days = ($request->gender && $request->gender == 'Female') ? $day + 500 : $day;
            }
            $request['nic_no'] = $date->year.$days.$registerNo.$checkDigit.'X';
            if(count(Patient::where('patient_uuid', $request['nic_no'])->get()) > 0) {
                return redirect()->route('patient.index')->withErrors(['nic_no' => 'Already taken!']);
            }
        }
        Patient::create(['patient_uuid' => $request['nic_no']]);
        return redirect()->route('patient.index');
    }

    public function existDiagnosis(Patient $patient, Diagnosis $diagnosis) {
//        $consultants = ['Consultant name' ,'Dr.S.T.Sharma', 'Dr.S.GobiShankar', 'Dr.S.Rajendra', 'Dr.S.Raviraj', 'Dr.T.Ambalavanan'];
        $consultants = (Designation::where('name', 'LIKE', '%Surgeon%')->first()) ? Staff::whereIn('designation_id', Designation::where('name', 'LIKE', '%Surgeon%')->lists('id')->toArray())->get()->lists('short_name', 'id') : [];
        $diagnosisTypeNames = SurgeryType::all();
        $diagnosisTypes = SurgeryType::with('treatmentTemplate')->get();

        $examination = $patient->examinations()->whereIn('surgical_followup_id', [0, null]);
        $bath0 = $patient->examination()->where('row', 10)->where('col', 1)->where('type', 'activities_examination')->first();
        $diagnosis->bath_0 = $bath0 ? $bath0->value : '-----';

        $followUp = $diagnosis->followUp()->with('drug', 'dose')->get();
        $drugs = Drug::lists('name', 'id');
        $doses = Drug::with('dose')->get();

        return view('admin.patient.diagnosis.edit', compact('examination', 'bioChemistry', 'microBiology', 'drugs','doses','followUp', 'patient', 'consultants','diagnosis', 'diagnosisTypes', 'diagnosisTypeNames', 'surgeryType', 'examination', 'bloodTest', 'investigationUltraSoundScan'));

    }

    public function updateDiagnosis(AddDiagnosisStoreRequest $request, Patient $patient, Diagnosis $diagnosis)
    {
        $diagnosis->co_mobidities = $request->co_mobidities;
        $diagnosis->drugs_on = $request->drugs_on;
        $diagnosis->height = $request->height;
        $diagnosis->weight = $request->weight;
        $weight = floatval($request->weight);
        $height = floatval($request->height);
        $bmi = $weight && $height ? floatval($weight) * 100 *100 / ($height * $height) : '';
        $diagnosis->bmi = round($bmi, 2);
        $diagnosis->date = $request->date;
        $diagnosis->staff_id = $request->staff_id;
        $diagnosis->refferred_from = $request->refferred_from;
        $diagnosis->presenting_complain = $request->presenting_complain;
        $diagnosis->past_surgical_history = $request->past_surgical_history;
        $diagnosis->allergic_history = $request->allergic_history;
        $diagnosis->x_ray = $request->x_ray;
        $diagnosis->ct_scan = $request->ct_scan;
        $diagnosis->miri_scan = $request->miri_scan;
        $diagnosis->other_imaging = $request->other_imaging;

        $diagnosis->diagnosis = $request->diagnosis;
        $diagnosis->drugs_given = $request->drugs_given;
        $diagnosis->surgical_management = $request->surgical_management;
        $diagnosis->non_surgical_management = $request->non_surgical_management;

        $diagnosis->en_treatment_template = $request->en_treatment_template;
        $diagnosis->ta_treatment_template = $request->ta_treatment_template;
        $diagnosis->si_treatment_template = $request->si_treatment_template;
        $diagnosis->save();

        $patient->diagnosis = 'active';
        $patient->save();


        $this->updatePatientFollowup($patient);

        return redirect()->route('patient.index');
    }

    public function saveProfile(PatientProfileUpdateRequest $request, Patient $patient)
    {
        $profile = ($patient->profile) ? $patient->profile : new Profile();
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->gender = $request->gender;
        $profile->age = $request->age;
        $profile->phone = $request->phone;
        $profile->country = $request->country;
        $profile->telephone = $request->telephone;
        $profile->email = $request->email;
        $profile->nic_no = $request->nic_no;
        $profile->passport_no = $request->passport_no;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->description = $request->description;
        $profile->save();

        $patient->profile()->save($profile);

        $file = $request->file('profile_image');
        if (isset($file)) {
            $fileType = $file->getMimeType();
            $destinationPath = base_path('public');
            $path = $destinationPath . '/media/images';

            if (str_contains($fileType, 'image')) {
                $imageName = 'image' . (count($profile->getMedia()) + 1) . '.' . $file->getClientOriginalExtension();
                $fileType = 'image';
            } elseif (str_contains($fileType, 'video')) {
                $imageName = 'video' . (count($profile->getMedia()) + 1) . '.' . $file->getClientOriginalExtension();
                $fileType = 'video';
            } elseif (str_contains($fileType, 'pdf') || str_contains($fileType, 'document')) {
                $imageName = 'document' . (count($profile->getMedia()) + 1) . '.' . $file->getClientOriginalExtension();
                $fileType = 'document';
            }

            $file->move($path, $imageName);
            $profile->addMedia($path . '/' . $imageName)->withCustomProperties(['type' => $fileType])->toCollectionOnDisk();

        }
        return redirect()->route('patient.show', $patient->id);

    }

    public function manageProfile(Patient $patient) {
        $profile = $patient->profile;
        return view('admin.patient.profile.manage', compact('profile', 'patient'));
    }

    public function sendMail($patients) {
        $patientIds = explode(",", $patients);
//        $patients = Patient::whereIn('patient_uuid', $patientIds)->get();
        event(new SendMail($patientIds));
        return redirect()->route('patient.index')->with('message', 'Patients data was successfully start  sending process!');
    }

    public function printCard($patients) {
        $patientIds = explode(",", $patients);
        $patients = Patient::whereIn('patient_uuid', $patientIds)->get();
        return view('admin.patient.reports.card', compact('patients'));
    }

    /*
    public function printCard(Request $request){
        $patientIds = $request->patients;
        $patients = Patient::whereIn('patient_uuid', $patientIds)->get();
        $this->data['patients'] = $patients;
        $pdf = PDF::loadView('admin.patient.reports.card', $this->data)->setPaper('a4');
        return $pdf->download('admin.patient.reports.card');
    }
    */

    public function printDiagnosis(Patient $patient) {
        $diagnosis = $patient->diagnosis()->get()->last();
        if(!isset($diagnosis)) {
            return redirect()->route('patient.index')->with('message', 'Please update or create Patients diagnosis card!');
        }
        $sugeryName = $patient->surgeryType()->get()->last() ? $patient->surgeryType()->get()->last()->name : '';
        $history = $diagnosis->history;
        $examination = $diagnosis->examination;
        $staff = $diagnosis->staff;
        $designation = $staff ? $staff->designation : '';
        $microBiology = $diagnosis->microBiology;
        $bioChemistry = $diagnosis->bioChemistry;
        $hematology = $diagnosis->hematology;
        $urineTest = $diagnosis->urineTest;
        $cxr = $diagnosis->cxr;
        $ultraSoundScan = $diagnosis->ultraSoundScan;
        $ctScan = $diagnosis->ctScan;
        $investigation = [];
        $investigation['microBiology'] = $microBiology;
        $investigation['bioChemistry'] = $bioChemistry;
        $investigation['hematology'] = $hematology;
        $investigation['urineTest'] = $urineTest;
        $investigation['cxr'] = $cxr;
        $investigation['ultraSoundScan'] = $ultraSoundScan;
        $investigation['ctScan'] = $ctScan;

        $treatment = $diagnosis->en_treatment_template;
        $followUpText = $diagnosis->ta_advice_for_patient;
        $followUpDrug = $diagnosis->followUp()->with('drug', 'dose')->get();
        $followUp['followUpDrug'] = $followUpDrug;
        $followUp['followUpText'] = $followUpText;

        return view('admin.patient.reports.diagnosis', compact('sugeryName','staff', 'designation', 'patient', 'diagnosis', 'history', 'examination', 'investigation', 'treatment', 'followUp'));
    }

    public function updateExamination(Patient $patient)
    {
        $data = request()->all();
        if(isset($data['diagnosis']) && $data['diagnosis'] == 'diagnosis') {
            $createExamination = Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('type', $data['data']['type'])->where('row', $data['data']['row'])->where('col', $data['data']['col'])->first();
        } else {
            $createExamination = Examination::where('patient_id', $patient->id)->where('type', $data['data']['type'])->where('row', $data['data']['row'])->where('col', $data['data']['col'])->first();
        }
        if (isset($data['data'])) {
            if ($createExamination) {
                $createExamination->value = $data['data']['value'];
                $createExamination->save();
            } else {
                $examination = new Examination();
                $examination->patient_id = $patient->id;
                $examination->row = $data['data']['row'];
                $examination->col = $data['data']['col'];
                $examination->value = $data['data']['value'];
                $examination->type = $data['data']['type'];
                $examination->save();
            }
        }
    }

    private function updatePatientFollowup(Patient $patient)
    {
        $examinations = $patient->examinations()->where('value', 1)->get();
        $rootExaminationFollowups = $examinations->where('type', 'root_examination');
        $rootExaminationFollowups = $rootExaminationFollowups->map(function ($item) {
            $item->motor_examination = isset($this->motorExamination[$item->row][$item->col]) ? $this->motorExamination[$item->row][$item->col] : '';
            return $item;
        })->pluck('motor_examination')->toArray();

        $rootExaminationFollowups = implode(" ", $rootExaminationFollowups);
        $patient->motor_examination = $rootExaminationFollowups;

        $sensory = $examinations->where('type', 'sensory_impairment');
        $sensory = $sensory->map(function ($item) {
            $item->sensory = isset($this->sensoryImpairmentExamination[$item->row][$item->col]) ? $this->sensoryImpairmentExamination[$item->row][$item->col] : '';
            return $item;
        })->pluck('sensory')->toArray();

        $sensory = implode(" ", $sensory);
        $patient->sensory = $sensory;

        $pain = $examinations->where('type', 'pain_scale');
        $pain = $pain->map(function ($item) {
            $item->pain = isset($this->painScaleExamination[$item->row][$item->col]) ? $this->painScaleExamination[$item->row][$item->col] : '';
            return $item;
        })->pluck('pain')->toArray();

        $pain = implode(" ", $pain);
        $patient->pain = $pain;


        $bath0 = $patient->examination()->where('row', 10)->where('col', 1)->where('type', 'activities_examination')->first();
        $bath_0 = $bath0 ? $bath0->value : '-----';
        $patient->activities_of_daily_living = $bath_0;

        $patient->save();

    }

    public function dailyReportExport()
    {
        $response =  array();
        $selectedAllFollowups = request()->selectedData;
        if($selectedAllFollowups && count($selectedAllFollowups)) {
            $datum = [];
            foreach ($selectedAllFollowups as $selectedAllFollowup) {
                $datum[] = [
                    'Id' => isset($selectedAllFollowup[0]) ? $selectedAllFollowup[0] : '',
                    'Account Number' => isset($selectedAllFollowup[1]) ? $selectedAllFollowup[1] : '',
                    'Invoice Number' => isset($selectedAllFollowup[2]) ? str_replace(" ", "", str_replace("<br>", ", ", $selectedAllFollowup[2])) : '',
                    'Reference Id' => isset($selectedAllFollowup[3]) ? str_replace(" ", "", str_replace("<br>", ", ", $selectedAllFollowup[3])) : '',
                    'Name' => isset($selectedAllFollowup[4]) ? $selectedAllFollowup[4] : '',
                    'IC' => isset($selectedAllFollowup[5]) ? $selectedAllFollowup[5] : '',
                    'Remarks' => isset($selectedAllFollowup[6]) ? $selectedAllFollowup[6] : '',
                    'Date and Time' => isset($selectedAllFollowup[7]) ? $selectedAllFollowup[7] : '',
                    'Debt Amount' => isset($selectedAllFollowup[8]) ? str_replace(" ", "", str_replace("<br>", ", ", $selectedAllFollowup[8])) : '',
                    'Outstanding' => isset($selectedAllFollowup[9]) ? str_replace(" ", "", str_replace("<br>", ", ", $selectedAllFollowup[9])) : '',
                    'PTP Date' => isset($selectedAllFollowup[10]) ? $selectedAllFollowup[10] : '',
                    'PTP Amount' => isset($selectedAllFollowup[11]) ? $selectedAllFollowup[11] : '',
                    'Collector' => isset($selectedAllFollowup[12]) ? $selectedAllFollowup[12] : '',
                    'Group' => isset($selectedAllFollowup[13]) ? $selectedAllFollowup[13] : '',
                    'Status' => isset($selectedAllFollowup[14]) ? $selectedAllFollowup[14] : '',
                    'Event' => isset($selectedAllFollowup[15]) ? $selectedAllFollowup[15] : '',
                    'Created At' => isset($selectedAllFollowup[16]) ? $selectedAllFollowup[16] : '',
                ];
            }
            $myFile= Excel::create('iCollect Daily Report', function($excel) use($datum) {
                if(count($datum)) {
                    $excel->sheet('iCollect Daily Report', function($sheet) use ($datum) {
                        $sheet->fromArray($datum);
                        $sheet->setOrientation('landscape');
                    });
                }

            });

            $myFile = $myFile->string('xls'); //change xlsx for the format you want, default is xls
            $response =  array(
                'name' => "iCollectDailyReport.xls", //no extention needed
                'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
            );


        }
        return response()->json($response);
    }


    public function search($q = null)
    {
        if($q == null) {
            $staff = Patient::get(['id', 'patient_uuid'])->toArray();
        } else {
            $staff = Patient::where('name', 'LIKE', '%' . $q . '%')->orWhere('patient_uuid', 'LIKE', '%' . $q . '%')->get(['id', 'patient_uuid'])->toArray();
        }
        $staff = array_map(function ($obj) {
            return ["name" => $obj['patient_uuid'], "value" => $obj['id']];
        }, $staff);
        return response()->json([ "success" => true, "results" => $staff]);
    }

}