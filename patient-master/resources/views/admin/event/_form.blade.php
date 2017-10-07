{{ form()->bsSelect('event_type_id', 'Event Type', $eventTypes) }}
{{ form()->bsText('what') }}

{{--{{ form()->suCombo('staff[]', 'Staff', null, 'multiple') }}--}}


<div class="form-group ">
    <label for="staff[]" class="col-sm-2 control-label">Staff</label>
    <div class="col-sm-10">
        <div class="ui fluid search selection dropdown multiple" id="ui_combo_staff">
            <input name="staff[]" type="hidden" value="{{ $staffIds  }}" id="staff[]">
            <i class="dropdown icon"></i>
            @if(isset($event))
                @foreach($event->staff as $key => $staff)
                    <a class="ui label transition visible" data-value="{{ $key }}" style="display: inline-block !important;">{{ $staff }}<i class="delete icon"></i></a>
                @endforeach
            @endif
            <div class="default text"></div>
        </div>
    </div>
</div>



{{ form()->suCheckbox('all_day', null, 'Yes') }}
{{ form()->bsText('start', null, $start, ['class' => 'form-control date-time-picker']) }}
{{ form()->bsText('end', null, $end, ['class' => 'form-control date-time-picker']) }}
{{--{{ form()->bsSelect('repeat', null, ['No' => 'No', 'Daily' => 'Daily', 'Weekdays' => 'Weekdays', 'Weekly' => 'Weekly', 'Monthly' => 'Monthly', 'Yearly' => 'Yearly']) }}--}}
{{ form()->bsSelect('repeat', null, ['No' => 'No', 'Daily' => 'Daily', 'Weekly' => 'Weekly', 'Monthly' => 'Monthly', 'Yearly' => 'Yearly']) }}
{{ form()->bsText('repeat_every') }}
{{ form()->bsText('repeat_end', null, null, ['class' => 'form-control date-picker']) }}
{{ form()->suCombo('where', null, null) }}
{{ form()->bsTextarea('description') }}
{{ form()->bsSelect('visibility', null, ['Public' => 'Public', 'Participants' => 'Participants Only']) }}


@section('script')
    @parent
    <script src="{{ asset('components/semantic/dist/semantic.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var inEventType = $('#event_type_id');
            var inRepeatEvery = $('#repeat_every');
            var inRepeatEnd = $('#repeat_end');
            var inRepeat = $('#repeat');
            var inWhat = $('#what');
            var inStaff = $('#ui_combo_staff');
            var inAllDay = $('#all_day');
            var inStart = $('#start');
            var inEnd = $('#end');
            var inDescription = $('#description');
            var inWhere = $('#where');
            var ddStaff = inStaff.dropdown('setting', {
                apiSettings: {
                    url: '{{ route('staff.search') }}/{query}'
                }
            });

            console.log('ddStaff', ddStaff);
            function resetUI() {
                inDescription.parents('.form-group').hide();
                inWhat.parents('.form-group').show();
                inRepeatEvery.parents('.form-group').show();
                inRepeatEnd.parents('.form-group').show();
                inStaff.parents('.form-group').show();
                inAllDay.parents('.form-group').show();
                inEnd.parents('.form-group').show();
                inRepeat.parents('.form-group').show();

                repeatUI(inRepeat.val(), true);
                eventTypeUI(inEventType.val(), true);
                whereUI(inWhere.val(), true);
            }
            resetUI();

            function eventTypeUI(eventType, doNotReset) {

                if(eventType == 2) {
                    {{--swal({--}}
                        {{--title: "Do you want to apply for leave?",--}}
                        {{--text: "",--}}
                        {{--type: "warning",--}}
                        {{--showCancelButton: true,--}}
                        {{--confirmButtonColor: "#5cb85c",--}}
                        {{--confirmButtonText: "Yes, I want!",--}}
                        {{--cancelButtonText: "No, cancel please!",--}}
                        {{--closeOnConfirm: true,--}}
                        {{--closeOnCancel: true--}}
                    {{--}, function (isConfirm) {--}}
                        {{--if (isConfirm) {--}}
                            {{--window.location = '{{ route('my-leave.create') }}';--}}
                        {{--}--}}
                    {{--});--}}
                }
//                inStaff.find('input[name="staff[]"]').val(null);
                {{--ddWhere.dropdown('set value', '{{ $event->where }}');--}}
//                ddStaff.dropdown('set text', '');
//                ddStaff.dropdown('set value', 0);

                if(!doNotReset) {
                    resetUI();
                }
                // Birthdays
                if(eventType == 3) {
                    inWhat.parents('.form-group').hide();
                    inAllDay.parents('.form-group').hide();
                    inEnd.parents('.form-group').hide();
                    inRepeat.val('Yearly');
                    inRepeatEvery.val(1);
                    repeatUI(inRepeat.val(), true);
                    inStaff.removeClass('multiple');
                    inAllDay.attr('checked', true);
                    dateTimePicker.data("DateTimePicker").format('YYYY-MM-DD');
                } else {
                    inStaff.addClass('multiple');
                    dateTimePicker.data("DateTimePicker").format('YYYY-MM-DD H:mm:ss');
                }
                // Public holidays
                if(eventType == 5) {
                    inStaff.parents('.form-group').hide();
                    inAllDay.parents('.form-group').hide();
                    inEnd.parents('.form-group').hide();
                }
            }



            function repeatUI(status, doNotReset) {
                if(!doNotReset) {
                    resetUI();
                }
                if(status == 'No') {
                    inRepeatEvery.parents('.form-group').hide();
                    inRepeatEnd.parents('.form-group').hide();
                } else {
                    inRepeatEvery.parents('.form-group').show();
                    inRepeatEnd.parents('.form-group').show();
                }

            }
            function whereUI(status, doNotReset) {
                if(!doNotReset) {
                    resetUI();
                }
                if(status == 'g2w') {
                    inDescription.parents('.form-group').show();
                } else {
                    inDescription.parents('.form-group').hide();
                }

            }

            inEventType.change(function () {
                eventTypeUI($(this).val());
            });
            inRepeat.change(function () {
                repeatUI($(this).val());
            });
            inWhere.change(function () {
                whereUI($(this).val());
            });

            $('.ui.checkbox').checkbox();

            var ddWhere = $('#ui_combo_where')
                .dropdown('setting', {
                    apiSettings: {
                        url: '{{ route('meeting.search') }}/{query}'
                    },
                    onComplete: function() {
                        $('#ui_combo_where').dropdown({allowAdditions: true});
                    }
                })
            ;

            @if(isset($event))
                ddWhere.dropdown('set text', '{{ ($event->where) }}');
                ddWhere.dropdown('set value', '{{ $event->where }}');
            @endif
        });
    </script>
@endsection