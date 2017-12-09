@extends('admin.layouts.master')
@section('title', 'Calendar')
@section('content')
    <link href="{{ asset('components/semantic/dist/semantic.min.css') }}" rel="stylesheet">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Calendar</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8">
                    <div id='event-calendar'></div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ route('event.type.create') }}" class="ui basic green button tiny">Add Event Type</a>
                        </div>
                        <div class="panel-body">
                            <div class="ui middle aligned divided list" id="event-type-item-wrapper">
                                @foreach($eventTypes as $type)
                                    <div class="item">
                                        <div class="right floated content">
                                            <a href="{{ route('event.type.edit', ['eventType' => $type->id]) }}" class="ui blue button tiny basic">Edit</a>
                                        </div>
                                        <i data-id="{{ $type->id }}" class="ui {{ $type->class }} empty circular label icon"></i>
                                        <div class="content">{{ $type->name }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#app').removeClass('container').addClass('container-fluid');
            var calendar = $('#event-calendar');
            var typeFilter = getCookie('typeFilter').split(',').map(Number);
            if (typeFilter[0] == '') {
                typeFilter = [{{ $eventTypes->implode('id', ', ') }}];
                setCookie('typeFilter', typeFilter, 720);
            }

            $('#event-type-item-wrapper').on('click', 'i.icon', function () {
                $(this).toggleClass('basic');
                typeFilter = [];
                $('#event-type-item-wrapper').find('i.icon').each(function (i, e) {
                    if(!$(this).hasClass('basic')) {
                        typeFilter.push($(e).data('id'));
                    }
                });
                if(typeFilter.length < 1) {
                    $(this).toggleClass('basic');
                    return true;
                }
                setCookie('typeFilter', typeFilter, 720);
                calendar.fullCalendar('refetchEvents');
            }).find('i.icon').each(function (i, e) {
                if($.inArray($(e).data('id'), typeFilter) < 0) {
                    $(e).addClass('basic');
                }
            });

            $('#app').removeClass('container').addClass('container-fluid');


            calendar.fullCalendar({
                customButtons: {
                    addEvent: {
                        text: 'Add Event',
                        click: function() {
                            window.location = "{{ route('event.create') }}"
                        }
                    }
                },
                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                header: {
                    left: 'prevYear,prev,next,nextYear today timelineYear,month,agendaWeek,agendaDay',
                    center: 'title',
                    right: 'addEvent'
                },
                views: {
                    timelineYear: {
                        buttonText: 'Timeline'
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    window.location = "{{ route('event.create') }}?start=" + start + '&end=' + end;
                },
                eventClick: function(calEvent) {
                    window.location = "{{ route('event.index') }}/" + calEvent.id;
                },
                editable: true,
                eventLimit: true,
                {{--events:"{!! route('event.index') !!}?types=" + typeFilter--}}
                eventSources: [
                    {
                        url:"{!! route('event.index') !!}",
                        type: 'GET',
                        data: function() { // a function that returns an object
                            return {
                                types: typeFilter.join()
                            };
                        },
                        error: function() {
                            alert('there was an error while fetching events!');
                        }
                    }
                ]
            });
        });
    </script>
@endsection