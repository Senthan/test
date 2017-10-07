<?php

namespace App\Http\Controllers\Admin;

use App\SurgeryType;
use App\TreatmentTemplate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TreatmentTemplateUpdateRequest;
use App\Http\Requests\TreatmentTemplateStoreRequest;
use App\Http\Requests\TemplateAddImageRequest;

use App\Transformers\TreatmentTemplateTransformer;

use Illuminate\Support\Facades\Storage;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;

class TreatmentTemplateController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            $treatmentTemplate = TreatmentTemplate::get();
            $resource = new Collection($treatmentTemplate, new TreatmentTemplateTransformer());
            $manager = new Manager();
            $manager->setSerializer(new DataArraySerializer());

            return $manager->createData($resource)->toArray();
        }

        return view('admin.treatment-template.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $diagnosisTypeNames = SurgeryType::all()->lists('name', 'id');
        return view('admin.treatment-template.create', compact('diagnosisTypeNames'));
    }

    /**
     * @param TreatmentTemplateStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TreatmentTemplateStoreRequest $request)
    {
        $surgeryType = SurgeryType::find($request->diagnosis);
        if(!isset($surgeryType)) {
            return redirect()->route('treatment.template.index')->with('message', 'TreatmentTemplate was not successfully created!');
        }
        $surgeryType->type_of_anaesthesia = $request->type_of_anaesthesia;
        $surgeryType->side = $request->side;
        $surgeryType->save();

        $treatmentTemplate = new TreatmentTemplate();
        $treatmentTemplate->surgery_type_id = $surgeryType->id;
        $treatmentTemplate->en_template = $request->en_template;
        $treatmentTemplate->ta_template = $request->ta_template;
        $treatmentTemplate->si_template = $request->si_template;
        $treatmentTemplate->save();

        $image = $request->file('image');
        if ($image) {
            $imageName = $treatmentTemplate->id . '.' . $image->getClientOriginalExtension();
            $treatmentTemplate->image = $imageName;
            $treatmentTemplate->save();
            Storage::put($treatmentTemplate->filePathLogo.$imageName, file_get_contents($request->file('image')->getRealPath()));
        }

        return redirect()->route('treatment.template.index')->with('message', 'TreatmentTemplate was successfully created!');
    }

    /**
     * @param TreatmentTemplate $treatmentTemplate
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(TreatmentTemplate $treatmentTemplate)
    {
        $diagnosisTypeNames = SurgeryType::all()->lists('name', 'id');
        $treatmentTemplate->diagnosis = $treatmentTemplate->surgery_type_id;
        return view('admin.treatment-template.edit', compact('treatmentTemplate', 'diagnosisTypeNames'));
    }

    /**
     * @param TreatmentTemplateUpdateRequest $request
     * @param TreatmentTemplate $treatmentTemplate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TreatmentTemplateUpdateRequest $request, TreatmentTemplate $treatmentTemplate)
    {
        $surgeryType = SurgeryType::find($request->diagnosis);
        $treatmentTemplate->surgery_type_id = $surgeryType->id;
        $surgeryType->type_of_anaesthesia = $request->type_of_anaesthesia;
        $surgeryType->side = $request->side;
        $surgeryType->save();
        $treatmentTemplate->en_template = $request->en_template;
        $treatmentTemplate->ta_template = $request->ta_template;
        $treatmentTemplate->si_template = $request->si_template;
        $treatmentTemplate->save();

        $image = $request->file('image');
        if ($image) {
            if ($treatmentTemplate->image) {
                Storage::delete($treatmentTemplate->filePathLogo.$treatmentTemplate->image);
            }
            $imageName = $treatmentTemplate->id . '.' . $image->getClientOriginalExtension();
            $treatmentTemplate->image = $imageName;
            $treatmentTemplate->save();
            Storage::put($treatmentTemplate->filePathLogo.$imageName, file_get_contents($request->file('image')->getRealPath()));
        }

        return redirect()->route('treatment.template.index')->with('message', 'TreatmentTemplate was successfully updated!');
    }

    /**
     * @param TreatmentTemplate $treatmentTemplate
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete(TreatmentTemplate $treatmentTemplate)
    {
        return view('admin.treatment-template.delete', compact('treatmentTemplate'));
    }

    /**
     * @param TreatmentTemplate $treatmentTemplate
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(TreatmentTemplate $treatmentTemplate)
    {
        $treatmentTemplate->delete();
        return redirect()->route('treatment.template.index')->with('message', 'TreatmentTemplate was successfully deleted!');
    }

    /**
     * @param TreatmentTemplate $treatmentTemplate
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(TreatmentTemplate $treatmentTemplate)
    {
        return view('admin.treatment-template.show', compact('treatmentTemplate'));
    }

    public function addImage(TreatmentTemplate $treatmentTemplate)
    {
        return view('admin.treatment-template.upload-image', compact('treatmentTemplate'));
    }

    public function uploadImage(TemplateAddImageRequest $request, TreatmentTemplate $treatmentTemplate)
    {
        $image = $request->file('image');
        if ($image) {
            if ($treatmentTemplate->image) {
                Storage::delete($treatmentTemplate->filePathLogo.$treatmentTemplate->image);
            }
            $imageName = $treatmentTemplate->id . '.' . $image->getClientOriginalExtension();
            $treatmentTemplate->image = $imageName;
            $treatmentTemplate->save();
            Storage::put($treatmentTemplate->filePathLogo.$imageName, file_get_contents($request->file('image')->getRealPath()));
        }
        return redirect()->route('treatment.template.show', ['treatment-template' => $treatmentTemplate->id])->with('message', 'Treatment template image was successfully uploaded!');
    }

    public function deleteImage(TreatmentTemplate $treatmentTemplate)
    {
        return view('admin.treatment-template.delete-image', compact('treatmentTemplate'));
    }

    public function destroyImage(TreatmentTemplate $treatmentTemplate)
    {
        /* delete image from storage */
        Storage::delete($treatmentTemplate->filePathLogo.$treatmentTemplate->image);

        $treatmentTemplate->image = null;
        $treatmentTemplate->save();

        return redirect()->route('treatment.template.show', ['treatment-template' => $treatmentTemplate->id])->with('message', 'Treatment template image was successfully deleted!');
    }
}
