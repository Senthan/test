@extends('admin.layouts.master')
@section('title', 'Edit event')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('event.index', 'Calendar') !!}</li>
        <li class="active">Details of Event</li>
    </ul>

    <div class="ui piled segments">
        <div class="ui {{ $event->eventType->class }} segment">
            <a href="{{ route('event.index') }}" class="btn btn-sm btn-default">Calendar</a>
                <a href="{{ route('event.edit', ['event' => $event->id]) }}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{ route('event.delete', ['event' => $event->id]) }}" class="btn btn-sm btn-danger">Delete</a>
        </div>
        <div class="ui segment">
            <div class="ui {{ $event->eventType->class }} segment">
                {{ $event->what }} - {{ $event->eventType->name }}
            </div>
            <table class="table table-bordered">
                <tr id="start">
                    <th>Start</th>
                    <td>{{ $event->start }}</td>
                </tr>
                <tr id="end">
                    <th>End</th>
                    <td>{{ $event->end }}</td>
                </tr>
                <tr id="all_day">
                    <th>All Day</th>
                    <td>{{ $event->all_day }}</td>
                </tr>
                <tr id="repeat">
                    <th>Repeat</th>
                    <td>{{ $event->repeat }}</td>
                </tr>
                <tr id="repeat_every">
                    <th>Repeat Every</th>
                    <td>{{ $event->repeat_every }}</td>
                </tr>
                <tr id="repeat_end">
                    <th>Repeat End</th>
                    <td>{{ $event->repeat_end }}</td>
                </tr>
                <tr id="where">
                    <th>Where</th>
                    <td>{{ $event->where }}</td>
                </tr>
                <tr id="timezone">
                    <th>Timezone</th>
                    <td>{{ $event->timezone }}</td>
                </tr>
                <tr id="name">
                    <th>Name</th>
                    <td>{{ $event->name }}</td>
                </tr>
                <tr id="email">
                    <th>Email</th>
                    <td>{{ $event->email }}</td>
                </tr>
                <tr id="description">
                    <th>Description</th>
                    <td>{{ $event->description }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>
        $(document).ready(function () {

            var eventTypeId = '{{ $event->eventType->id or '' }}';
            var inWhat = $('#what');
            var inAllDay = $('#all_day');
            var inStart = $('#start');
            var inEnd = $('#end');
            var inRepeat = $('#repeat');
            var inRepeatEvery = $('#repeat_every');
            var inRepeatEnd = $('#repeat_end');
            var inWhere = $('#where');
            var inDescription = $('#description');
            var inName = $('#name');
            var inEmail = $('#email');

            eventTypeUI(eventTypeId);
            function eventTypeUI(eventType) {

                inName.hide();
                inEmail.hide();

                if(eventType == 2) {
                    inWhere.hide();
                }

                // Birthdays
                if(eventType == 3) {
                    inWhat.hide();
                    inAllDay.hide();
                    inEnd.hide();
                }

                // Public holidays
                if(eventType == 5) {
                    inAllDay.hide();
                    inEnd.hide();
                }

                if(eventType == 10) {
                    inDescription.hide();
                    inRepeatEvery.hide();
                    inRepeatEnd.hide();
                    inWhat.hide();
                    inAllDay.hide();
                    inEnd.hide();
                    inRepeat.hide();
                    inWhere.hide();
                    inName.show();
                    inEmail.show();
                }

            }
        });
    </script>
@endsection