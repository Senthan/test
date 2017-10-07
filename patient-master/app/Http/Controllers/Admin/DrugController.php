<?php

namespace App\Http\Controllers\Admin;

use App\Drug;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Requests\DrugUpdateRequest;
use App\Http\Requests\DrugStoreRequest;

use App\Transformers\DrugTransformer;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;

class DrugController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $drug = Drug::get();
            $resource = new Collection($drug, new DrugTransformer());
            $manager = new Manager();
            $manager->setSerializer(new DataArraySerializer());

            return $manager->createData($resource)->toArray();
        }

        return view('admin.drug.index');
    }

    public function create()
    {
        return view('admin.drug.create');
    }

    public function store(DrugStoreRequest $request)
    {
        $drug = Drug::create($request->only(['name']));
        return redirect()->route('drug.index')->with('message', 'Drug was successfully created!');
    }

    public function edit(Drug $drug)
    {
        return view('admin.drug.edit', compact('drug'));
    }

    public function update(DrugUpdateRequest $request, Drug $drug)
    {
        $drug->update($request->only(['name']));
        return redirect()->route('drug.index')->with('message', 'Drug was successfully updated!');
    }

    public function delete(Drug $drug)
    {
        return view('admin.drug.delete', compact('drug'));
    }

    public function destroy(Drug $drug)
    {
        $drug->delete();
        return redirect()->route('drug.index')->with('message', 'Drug was successfully deleted!');
    }

    public function show(Drug $drug)
    {
        return view('admin.drug.show', compact('Drug'));
    }
}
