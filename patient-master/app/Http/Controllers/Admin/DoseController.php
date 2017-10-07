<?php

namespace App\Http\Controllers\Admin;

use App\Dose;
use App\Drug;
use App\DrugDose;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\DrugDoseStoreRequest;
use App\Http\Requests\DrugDoseUpdateRequest;

use App\Transformers\DrugTransformer;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;

class DoseController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $drug = Drug::whereHas('dose', function($q){
                return $q;
            })->get();
            $resource = new Collection($drug, new DrugTransformer());
            $manager = new Manager();
            $manager->setSerializer(new DataArraySerializer());

            return $manager->createData($resource)->toArray();
        }

        return view('admin.drug-dose.index');
    }

    public function create()
    {
        $drugs = Drug::lists('name', 'id');
        $dose = Dose::lists('dose', 'id');
        return view('admin.drug-dose.create', compact('drugs', 'dose'));
    }

    public function store(DrugDoseStoreRequest $request)
    {
        $doses =  $request->dose;
        foreach($doses as $dose) {
            $dose = Dose::firstOrCreate(['dose' => $dose]);
            $drugDose = new DrugDose();
            $drugDose->dose_id = $dose->id;
            $drugDose->drug_id = $request->drug;
            $drugDose->description = $request->description;
            $drugDose->save();
        }
        return redirect()->route('dose.index')->with('message', 'Drug was successfully created!');
    }

    public function edit(Dose $dose)
    {
        $storeDrugs = $dose->drugs;
        $drugs = Drug::lists('name', 'id');
        return view('admin.drug-dose.edit', compact('dose', 'drugs', 'storeDrugs'));
    }

    public function update(DrugDoseUpdateRequest $request, Drug $drug)
    {
        DrugDose::where('drug_id', $drug->id)->delete();
        $doses =  $request->dose;
        foreach($doses as $dose) {
            $dose = Dose::firstOrCreate(['dose' => $dose]);
            $drugDose = new DrugDose();
            $drugDose->dose_id = $dose->id;
            $drugDose->drug_id = $request->drug;
            $drugDose->description = $request->description;
            $drugDose->save();
        }
        return redirect()->route('dose.index')->with('message', 'Drug was successfully updated!');
    }

    public function delete(Drug $drug)
    {
        return view('admin.drug-dose.delete', compact('drug'));
    }

    public function destroy(Drug $drug)
    {
        DrugDose::where('drug_id', $drug->id)->delete();
        $drug->delete();
        return redirect()->route('dose.index')->with('message', 'Drug was successfully deleted!');
    }

    public function show(Drug $drug)
    {
        return view('admin.drug-dose.show', compact('drug'));
    }
}
