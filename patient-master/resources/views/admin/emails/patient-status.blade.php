@extends('emails.layout')
@section('title')
    Teaching Hospital Jaffna
@endsection
@section('content')
<div style="padding-top: 5px;padding-bottom: 10px;padding-left: 5px;line-height: 20px;font-size: 13px;font-family: sans-serif;margin-bottom: 10px;min-height: 300px;">
    <p style="font-size: 15px;font-weight: bold;color: #025886;font-family: sans-serif;">Dr. {{ $data['staffName'] }} MBBS, MS, MRCS,</p>
    <p style="font-size: 13px;font-weight: 500;color: #1B5778;font-family: sans-serif;">{{ $data['staffDesignation'] }},</p>
    <p style="font-size: 13px;font-weight: 500;color: #1B5778;font-family: sans-serif;">Teaching Hospital, Jaffna.</p>


    <p style="font-size: 15px;font-weight: 500;color: #262626;font-family: sans-serif;">Dear Madam/Sir,</p>
    <p style="font-size: 15px;font-weight: 500;color: #262626;font-family: sans-serif;">The following patients are approved for surgery on your list on {{ $data['date'] or ''  }}.</p>

    <div style="overflow-x:auto;">
        <table style="border-collapse: collapse; width: 100%;">
            <tr>
                <th style="text-align: left; color: #262626; padding: 8px;">Patient Name</th>
                <th style="text-align: left; color: #262626; padding: 8px;">Age</th>
                <th style="text-align: left; color: #262626; padding: 8px;">Type of Surgery</th>
            </tr>
            @foreach($data as $key => $patient)
                @if($key % 2 == 0)
                <tr>
                @else
                <tr style="background-color: #f2f2f2">
                @endif
                    <td style="text-align: left; color: #262626; padding: 8px;">{{ $patient['name'] or '' }}</td>
                    <td style="text-align: left; color: #262626; padding: 8px;">{{ $patient['age'] or '' }}</td>
                    <td style="text-align: left; color: #262626; padding: 8px;">{{ isset($patient['surgeryType']['data']) ? $patient['surgeryType']['data'][count($patient['surgeryType']['data']) -1]['name'] : ''  }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection