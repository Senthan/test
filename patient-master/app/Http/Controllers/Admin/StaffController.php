<?php

namespace App\Http\Controllers\Admin;

use App\Designation;
use App\Events\UserWasCreated;
use App\Staff;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Transformers\StaffTransformer;
use App\Http\Requests\StaffStoreRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Http\Requests\StaffDestroyRequest;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            $staff = Staff::get();
            $resource = new Collection($staff, new StaffTransformer());
            $manager = new Manager();
            $manager->setSerializer(new DataArraySerializer());

            return $manager->createData($resource)->toArray();
        }

        return view('admin.staffs.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $designations = Designation::lists('name', 'id');
        return view('admin.staffs.create', compact('designations'));
    }

    /**
     * @param staffStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StaffStoreRequest $request)
    {
        $staff = Staff::create($request->only(['first_name', 'last_name', 'short_name', 'email',  'is_active', 'designation_id', 'description']));
        $user = new User();
        $user->staff_id = $staff->id;
        $user->email = $staff->email;
        $user->name = $staff->first_name;
        $user->save();
        $image = $request->file('profile_image');
        if ($image) {
            $imageName = $staff->id . '.' . $image->getClientOriginalExtension();
            $staff->profile_image = $imageName;
            $staff->save();
            Storage::put($staff->filePathLogo.$imageName, file_get_contents($request->file('profile_image')->getRealPath()));
        }
        return redirect()->route('staff.index')->with('message', 'Staff was successfully created!');
    }

    /**
     * @param Staff $staff
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Staff $staff)
    {
        $designations = Designation::lists('name', 'id');
        return view('admin.staffs.edit', compact('staff', 'designations'));
    }

    /**
     * @param StaffUpdateRequest $request
     * @param Staff $staff
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StaffUpdateRequest $request, Staff $staff)
    {
        $staff->update($request->only(['first_name', 'last_name', 'short_name', 'email', 'is_active', 'designation_id', 'description']));
        $image = $request->file('profile_image');
        if ($image) {
            if ($staff->profile_image) {
                Storage::delete($staff->filePathLogo.$staff->profile_image);
            }
            $imageName = $staff->id . '.' . $image->getClientOriginalExtension();
            Storage::put($staff->filePathLogo.$imageName, file_get_contents($request->file('profile_image')->getRealPath()));
            $staff->profile_image = $imageName;
            $staff->save();
        }
        return redirect()->route('staff.index')->with('message', 'Staff was successfully updated!');
    }

    /**
     * @param Staff $staff
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete(Staff $staff)
    {
        return view('admin.staffs.delete', compact('staff'));
    }

    /**
     * @param Staff $staff
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Staff $staff)
    {
        Storage::delete($staff->filePathLogo.$staff->profile_image);
        $staff->delete();
        $user = $staff->user()->first();
        $user->delete();
        return redirect()->route('staff.index')->with('message', 'Staff was successfully deleted!');
    }

    /**
     * @param Staff $staff
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Staff $staff)
    {
        return view('admin.staffs.show', compact('staff'));
    }

    public function search($q = null)
    {
        if($q == null) {
            $staff = Staff::get(['id', 'short_name'])->toArray();
        } else {
            $staff = Staff::where('short_name', 'LIKE', '%' . $q . '%')->orWhere('first_name', 'LIKE', '%' . $q . '%')->get(['id', 'short_name'])->toArray();
        }
        $staff = array_map(function ($obj) {
            return ["name" => $obj['short_name'], "value" => $obj['id']];
        }, $staff);
        return response()->json([ "success" => true, "results" => $staff]);
    }
}
