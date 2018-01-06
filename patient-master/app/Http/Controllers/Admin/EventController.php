<?php

namespace App\Http\Controllers\Admin;

use App\Events\EventNotification;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event;
use App\EventType;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;

class EventController extends Controller
{
    protected $event;

    public function __construct(EventRepository $event)
    {
        $this->event = $event;
        parent::__construct();
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->event->retrieve(request()->only(['start', 'end']), request()->input('types'))->transform()->get();
        }
        $eventTypes = EventType::get();
        return view('admin.event.index', compact('eventTypes'));
    }

    public function create()
    {
        $start = request()->input('start', null);
        $end = request()->input('end', null);
        if(!$start) {
            $start = carbon()->now();
        } else {
            $start = carbon()->createFromTimestamp($start / 1000);
        }
        if(!$end) {
            $end = carbon()->now();
        } else {
            $end = carbon()->createFromTimestamp($end / 1000);
        }
        $eventTypes = EventType::lists('name', 'id');
        $staffIds = collect([]);
        $patientIds = collect([]);
        return view('admin.event.create', compact('patientIds', 'eventTypes', 'start', 'end', 'staffIds'));
    }

    public function store(EventStoreRequest $request)
    {

        if($request->input('repeat_end') == '') {
            $request->merge(['repeat_end' => null]);
        }
        if($request->input('all_day') == null) {
            $request->merge(['all_day' => 'No']);
        }
        if($request->input('repeat_every') == '') {
            $request->merge(['repeat_every' => null]);
        }

        if($request->input('event_type_id') == 3) {
            $request->merge(['end' => $request->input('start')]);
        }



        $event = Event::create($request->only(['event_type_id', 'what', 'all_day', 'start', 'end', 'repeat', 'repeat_every', 'repeat_end', 'where', 'visibility']));
        if(count($request->input('staff'))) {
            $staffIDs = array_values(array_filter(explode(',', trim($request->input('staff')[0], ' []'))));
            if(count($staffIDs)) {
                $event->staff()->attach($staffIDs);
                if($request->input('event_type_id') == 3) {
                    $staff = $event->staff()->first();
                    $event->what = $staff->short_name . ' BD';
                    $event->save();
                }
            }
        }

        if(count($request->input('patient'))) {
            $patientIDs = array_values(array_filter(explode(',', trim($request->input('patient')[0], ' []'))));
            if(count($patientIDs)) {
                $event->patient()->attach($patientIDs);
                if($request->input('event_type_id') == 3) {
                    $staff = $event->patient()->first();
                    $event->what = $staff->patient_uuid . ' BD';
                    $event->save();
                }
            }
        }

        $users = (isset($event) && $event->visibility == 'Participants') ? $event->staff()->with('user')->get()->pluck('user')->pluck('id') : null;
        if($event && $event->visibility != 'Participants'){
            event(new EventNotification());
        }else{
            foreach($users as $user) {
                event(new EventNotification($user));
            }
        }

        return redirect()->route('event.index');
    }


    public function show(Event $event)
    {
        $meeting = null;
        $staff = null;
        $eventType = EventType::where('name', 'like', '%Interview%')->first();
        $eventTypeId = $eventType ? $eventType->id : null;
        if(isset($eventTypeId) && $event->event_type_id == $eventTypeId){
            $interview = $event->interview;
            $event->name = ($interview) ?  $interview->name : '';
            $event->email = ($interview) ?  $interview->email : '';
            $event->stream = ($interview) ?  $interview->stream : '';
        }
        $event->start = $event->start ? $event->start->timezone(config('app.timezone')) : '';
        $event->end = $event->end ? $event->end->timezone(config('app.timezone')) : '';

        return view('admin.event.show', compact('event', 'staff', 'meeting'));
    }



    public function edit(Event $event)
    {
        $event->start =  carbon()->parse($event->start)->tz(config('app.timezone'));
        $event->end = carbon()->parse($event->end)->tz(config('app.timezone'));
        $start = $event->start;
        $end = $event->end;
        $event->staff = $event->staff()->get()->lists('short_name', 'id');
        $event->patient = $event->patient()->get()->lists('patient_uuid', 'id');
        $staffIds = implode(",", $event->staff()->get()->pluck('id')->toArray());
        $patientIds = implode(",", $event->patient()->get()->pluck('id')->toArray());
        $eventTypes = EventType::lists('name', 'id');
        return view('admin.event.edit', compact('patientIds', 'event', 'eventTypes', 'start', 'end', 'staffIds'));
    }

    public function update(EventUpdateRequest $request, Event $event)
    {
        if($request->input('repeat_end') == '') {
            $request->merge(['repeat_end' => null]);
        }
        if($request->input('all_day') == null) {
            $request->merge(['all_day' => 'No']);
        }
        if($request->input('repeat_every') == '') {
            $request->merge(['repeat_every' => null]);
        }
        $event->update($request->only(['event_type_id', 'what', 'all_day', 'start', 'end', 'repeat', 'repeat_every', 'repeat_end', 'where', 'visibility']));
        $event->staff()->detach();
        if(count($request->input('staff'))) {
            $staffIDs = array_values(array_filter(explode(',', trim($request->input('staff')[0], ' []'))));
            if(count($staffIDs)) {
                $event->staff()->attach($staffIDs);
            }
        }
        $event->patient()->detach();
        if(count($request->input('patient'))) {
            $patientIDs = array_values(array_filter(explode(',', trim($request->input('patient')[0], ' []'))));
            if(count($patientIDs)) {
                $event->patient()->attach($patientIDs);
            }
        }
        $users = (isset($event) && $event->visibility == 'Participants') ? $event->staff()->with('user')->get()->pluck('user')->pluck('id') : null;
        if($event && $event->visibility != 'Participants'){
            event(new EventNotification());
        }else{
            foreach($users as $user) {
                event(new EventNotification($user));
            }
        }

        return redirect()->route('event.index');
    }


    public function delete(Event $event)
    {
        return view('admin.event.delete', compact('event'));
    }

    public function destroy(Request $request, Event $event)
    {
        $event->staff()->detach();
        $event->patient()->detach();
        $event->delete();
        return redirect()->route('event.index');
    }

    public function searchMeetings($q = null)
    {
        $places = [
            ['name' => 'Go2Meeting', 'value' => 'g2m'],
            ['name' => 'Go2Webinar', 'value' => 'g2w'],
            ['name' => 'Skype', 'value' => 'skype']
        ];
        return response()->json([ "success" => true, "results" => $places]);
    }
}
