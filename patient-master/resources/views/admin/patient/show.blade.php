@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li class="active">Summary</li>
    </ul>
    <div class="container-fluid">
        <section class="content">
            <div class="ui segments">
                <div class="ui olive segment">
                    <table class="ui celled table">
                        <thead>
                        <tr>
                            <th colspan="7">
                                Patient Pesional Data
                            </th>
                        </tr>
                        <tr>
                            <th> OSC No </th>
                            <th> Name </th>
                            <th> Age </th>
                            <th> Gender </th>
                            <th> Address </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> {!! $patient->patient_uuid !!}</td>
                            <td> {!! $patient->name !!}</td>
                            <td> {!! $patient->age !!}</td>
                            <td> {!! $patient->sex !!}</td>
                            <td> {!! $patient->address !!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="ui green segment">
                    <table class="ui celled table">
                        <thead>
                        <tr>
                            <th colspan="7">
                                First clinic visit
                            </th>
                        </tr>
                        <tr>
                            <th> Height (cm) </th>
                            <th> Weight (kg) </th>
                            <th> BMI (10^-2kg) </th>

                        </tr>
                        </thead>
                        <tbody>
                            <tr>

                            <td> {!! $patient->diagnosis()->first() ? $patient->diagnosis()->first()->height .' cm' : '' !!}</td>
                            <td> {!! $patient->diagnosis()->first() ? $patient->diagnosis()->first()->weight . ' kg' : '' !!}</td>
                            <td> {!! $patient->diagnosis()->first() ? $patient->diagnosis()->first()->bmi . ' x 10^-2 kg' : '' !!}</td>

                           </tr>
                        </tbody>
                    </table>

                    <div class="ui piled segments">
                        <div class="ui segment">
                            <h4 class="ui header">Co Morbidities</h4>
                            <p>{!! $patient->diagnosis()->first()->co_mobidities or '-----' !!}</p>
                        </div>
                        <div class="ui segment">
                            <h4 class="ui header">Drugs on</h4>
                            <p>{!! $patient->diagnosis()->first()->drugs_on or '-----' !!}</p>
                        </div>
                        <div class="ui segment">
                            <h4 class="ui header">Referred from</h4>
                            <p>{!! $patient->diagnosis()->first()->refferred_from or '-----' !!}</p>
                        </div>
                        <div class="ui segment">
                            <h4 class="ui header">Presenting complain</h4>
                            <p>{!! $patient->diagnosis()->first()->presenting_complain or '-----' !!}</p>
                        </div>
                        <div class="ui segment">
                            <h4 class="ui header">Past surgical history</h4>
                            <p>{!! $patient->diagnosis()->first()->past_surgical_history or '-----' !!}</p>
                        </div>
                        <div class="ui segment">
                            <h4 class="ui header">Allergic history</h4>
                            <p>{!! $patient->diagnosis()->first()->allergic_history or '-----' !!}</p>
                        </div>
                    </div>

                    <table class="ui celled table">
                        <thead>
                        <tr>
                            <th colspan="7">
                                Motor Examination
                            </th>
                        </tr>
                        <tr>
                            <th class="header">Root</th>
                            <th class="header"> Examination </th>
                            <th colspan="2" class="header"> Grade 0 </th>
                            <th colspan="2" class="header"> Grade 1 </th>
                            <th colspan="2" class="header"> Grade 2 </th>
                            <th colspan="2" class="header"> Grade 3 </th>
                            <th colspan="2" class="header"> Grade 4 </th>
                            <th colspan="2" class="header"> Grade 5 </th>
                        </tr>
                        <tr>
                            <th class="header">  </th>
                            <th class="header">  </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="item1">
                            <td>C5</td>
                            <td>Elbow extensors</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>C6</td>
                            <td>Wrist extensors</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>C8</td>
                            <td>Finger flexors</td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>T1</td>
                            <td>Small Finger Abductors</td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>L2</td>
                            <td>Hip flexors</td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>L3</td>
                            <td>Knee extensors</td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>L4</td>
                            <td>Ankle dorsiflexors</td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>L5</td>
                            <td>Long toe extensors</td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>


                        <tr class="item1">
                            <td>S1</td>
                            <td>Ankle plantar flexors</td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        </tbody>
                    </table>


                    <table class="ui celled table reflexes-examination">
                        <thead>
                        <tr><th colspan="1"></th>
                            <th colspan="1"></th>
                            <th colspan="10">Grading</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="ui ribbon label">Reflexes</div>
                            </td>
                            <td></td>
                            <td colspan="2">Grade 0</td>
                            <td colspan="2">Grade 1</td>
                            <td colspan="2">Grade 2</td>
                            <td colspan="2">Grade 3</td>
                            <td colspan="2">Grade 4</td>
                        </tr>
                        <tr>
                            <th class="header">  </th>
                            <th class="header">  </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Biceps C5</td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Brachioradialis C6</td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Triceps C7</td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Fingers C8</td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 5)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Hoffmann's sign</td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 6)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Knee L4</td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 7)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Ankle S1</td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! $patient->examinations()->where('row', 8)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="ui celled table sensory-impairment">
                        <thead>
                        <tr>
                            <th colspan="7">
                                Sensory Impairment
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Cervical</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C1</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 2)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C2</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 3)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C3</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 4)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C4</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 5)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C5</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 6)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C6</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 7)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C7</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 8)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C8</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Thoracic</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T1</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 2)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T2</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 3)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T3</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 4)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T4</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 5)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T5</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 6)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T6</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 7)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T7</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 8)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T8</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 9)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T9</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 10)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T10</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 11)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T11</td>
                            <td class="{!! $patient->examinations()->where('row', 1)->where('col', 12)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T12</td>
                        </tr>
                        <tr>
                            <td>Lumbar</td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L1</td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 2)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L2</td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 3)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L3</td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 4)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L4</td>
                            <td class="{!! $patient->examinations()->where('row', 2)->where('col', 5)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Sacral</td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S1</td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 2)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S2</td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 3)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S3</td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 4)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S4</td>
                            <td class="{!! $patient->examinations()->where('row', 3)->where('col', 5)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Coccygeal</td>
                            <td class="{!! $patient->examinations()->where('row', 4)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">Cx</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="ui celled table pain-scale">
                        <thead>
                        <tr>
                            <th colspan="7">
                                Pain Scale
                            </th>
                        </tr>
                        <tr>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 0)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">0</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 1)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">1</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 2)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">2</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 3)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">3</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 4)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">4</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 5)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">5</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 6)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">6</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 7)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">7</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 8)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">8</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 9)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">9</td>
                            <td class="{!! $patient->examinations()->where('row', 0)->where('col', 10)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">10</td>
                        </tr>
                        </thead>
                    </table>

                    <table class="ui celled table">
                        <thead>
                        <tr>
                            <th colspan="7">
                                Activities of Daily Living
                            </th>
                        </tr>
                        <tr>
                            <td>Barthel Index</td>
                            <td colspan="4">
                                {!! $bath_0 or '-----' !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="ui segments">
                        <div class="ui segment">
                            <h3 class="ui header">Imaging</h3>
                        </div>
                        <div class="ui segments">

                            <div class="ui segment">
                                <h4 class="ui header">X ray</h4>
                                <p>{!! $patient->diagnosis()->first()->x_ray or '-----' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header">CT scan</h4>
                                <p>{!! $patient->diagnosis()->first()->ct_scan or '-----' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header">MRI scan</h4>
                                <p>{!! $patient->diagnosis()->first()->miri_scan or '-----' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header">Other imaging</h4>
                                <p>{!! $patient->diagnosis()->first()->other_imaging or '-----' !!}</p>
                            </div>

                        </div>

                    </div>
                    <div class="ui segments">
                        <div class="ui segment">
                            <h3 class="ui header">Management</h3>
                        </div>
                        <div class="ui segments">
                            <div class="ui segment">
                                <h4 class="ui header">Surgical management</h4>
                                <p>{!! $patient->diagnosis()->first()->surgical_management or '-----' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header">Non surgical management</h4>
                                <p>{!! $patient->diagnosis()->first()->non_surgical_management or '-----' !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="ui segment">
                        <h4 class="ui header">Drugs given</h4>
                        <p>{!! $patient->diagnosis()->first()->drugs_given or '-----' !!}</p>
                    </div>

                </div>


                <div class="ui segment olive clearfix">

                    <table class="ui celled table">
                        <thead>
                        <tr>
                            <th colspan="7">
                                Refferal
                            </th>
                        </tr>
                        <tr>
                            <th> Refferal </th>
                            <th> Refered to </th>
                            <th> Report </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patient->refferal as $refferal)
                            <tr>
                                <td> {!! $refferal->refferal or '' !!}</td>
                                <td> {!! $refferal->reffered_to or '' !!}</td>
                                <td> {!! $refferal->report or '' !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="ui segment blue clearfix g">



                    <div class="ui segments">
                        <div class="ui segment">
                            <h3 class="ui header">Surgical Admission</h3>
                        </div>
                        @foreach($patient->surgical as $surgical)
                        <div class="ui segments">
                            <div class="ui segment">
                                <h4 class="ui header"> Date of admission </h4>
                                <p> {!! $surgical->date_of_admission or '' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header"> Date of surgery </h4>
                                <p> {!! $surgical->date_of_surgery or '' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header"> Date of discharge </h4>
                                <p> {!! $surgical->date_of_discharge or '' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header"> Surgery </h4>
                                <p> {!! $surgical->surgery or '' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header"> Complication </h4>
                                <p> {!! $surgical->complication or '' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header"> Discharge plan </h4>
                                <p> {!! $surgical->discharge_plan or '' !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <table class="ui celled blue padded table">
                    <thead>
                    <tr>
                        <th colspan="{{ $patient->surgicalFollowup->count() + 1 }}">
                            Surgical Followup
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Date</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                {!! $surgicalFollowup->date or '-----' !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Post op</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                @if($surgicalFollowup->post_up_days != 0)
                                    {!! $surgicalFollowup->post_up_days . ' days' !!}
                                @endif
                                @if($surgicalFollowup->post_up_weeks != 0)
                                    {!! $surgicalFollowup->post_up_weeks . ' weeks' !!}
                                @endif
                                @if($surgicalFollowup->post_up_months != 0)
                                    {!! $surgicalFollowup->post_up_months . ' months' !!}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Complain</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                {!! $surgicalFollowup->complain or '' !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Motor Examination</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                @foreach($surgicalFollowup->examinationFollowups as $examinationFollowup)
                                    @if($examinationFollowup->type == 'root_examination_followup' && $examinationFollowup->value == 1)
                                        {{ isset($motorExamination[$examinationFollowup->row][$examinationFollowup->col]) ? $motorExamination[$examinationFollowup->row][$examinationFollowup->col] . ' ' : '' }}
                                    @endif
                                @endforeach
                            </td>
                            @endforeach
                    </tr>
                    <tr>
                        <th>Reflexes</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                @foreach($surgicalFollowup->examinationFollowups as $examinationFollowup)
                                    @if($examinationFollowup->type == 'reflexes_examination_followup')
                                        {{ isset($reflexesExamination[$examinationFollowup->row][$examinationFollowup->col]) ? $reflexesExamination[$examinationFollowup->row][$examinationFollowup->col] . ' ' : '' }}
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Sensory Impairment</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                @foreach($surgicalFollowup->examinationFollowups as $examinationFollowup)
                                    @if($examinationFollowup->type == 'sensory_impairment_followup')
                                        {{ isset($sensoryImpairmentExamination[$examinationFollowup->row][$examinationFollowup->col]) ? $sensoryImpairmentExamination[$examinationFollowup->row][$examinationFollowup->col] . ' ' : '' }}
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Pain Scale</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                @foreach($surgicalFollowup->examinationFollowups as $examinationFollowup)
                                    @if($examinationFollowup->type == 'pain_scale_followup')
                                        {{ isset($painScaleExamination[$examinationFollowup->row][$examinationFollowup->col]) ? $painScaleExamination[$examinationFollowup->row][$examinationFollowup->col] . ' ' : '' }}
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Activities of Daily Living</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                @foreach($surgicalFollowup->examinationFollowups as $examinationFollowup)
                                    @if($examinationFollowup->type == 'activities_examination_followup' && $examinationFollowup->row == 10 && $examinationFollowup->col == 1)
                                        Barthel Index : {!! $examinationFollowup->value or '-----' !!}
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Investigation</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                {!! $surgicalFollowup->investigation or '-----' !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Management</th>
                        @foreach($patient->surgicalFollowup as $surgicalFollowup)
                            <td>
                                {!! $surgicalFollowup->management or '-----' !!}
                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>

                <div class="ui segment orange clearfix">
                    <div class="ui segments">
                        <div class="ui segment">
                            <h3 class="ui header">Non Surgical Admission</h3>
                        </div>
                        @foreach($patient->nonSurgical as $nonSurgical)
                        <div class="ui segments">
                            <div class="ui segment">
                                <h4 class="ui header"> Date of admission </h4>
                                <p> {!! $nonSurgical->date_of_admission or '-----' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header"> Date of discharge </h4>
                                <p> {!! $nonSurgical->date_of_discharge or '-----' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header"> Indication for admission </h4>
                                <p> {!! $nonSurgical->indication_admission or '-----' !!}</p>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui header"> Management </h4>
                                <p> {!! $nonSurgical->management or '-----' !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <table class="ui celled blue padded table">
                    <thead>
                    <tr>
                        <th colspan="{{ $patient->nonSurgicalFollowup->count() + 1 }}">
                            Non Surgical Followup
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Date</th>
                        @foreach($patient->nonSurgicalFollowup as $surgicalFollowup)
                            <td>
                                {!! $nonSurgicalFollowup->date or '-----' !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Complain</th>
                        @foreach($patient->nonSurgicalFollowup as $nonSurgicalFollowup)
                            <td>
                                {!! $surgicalFollowup->complain or '' !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Examination</th>
                        @foreach($patient->nonSurgicalFollowup as $nonSurgicalFollowup)
                            <td>
                                {!! $nonSurgicalFollowup->examination or '' !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Investigation</th>
                        @foreach($patient->nonSurgicalFollowup as $nonSurgicalFollowup)
                            <td>
                                {!! $nonSurgicalFollowup->investigation or '' !!}
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Management</th>
                        @foreach($patient->nonSurgicalFollowup as $nonSurgicalFollowup)
                            <td>
                                {!! $nonSurgicalFollowup->management or '' !!}
                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>


            </div>
        </section>
    </div>
@endsection