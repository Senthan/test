@extends('emails.layout')
@section('title')
    Teaching Hospital Jaffna
@endsection
@section('content')
    <p>Dear Dr.{{ $name }},</p>
    <p>Please use below credentials to access admin panel of Teaching Hospital Jaffna.</p>
    <table>
        <tr>
            <td style="font-size: 11px;font-weight: bold;color: #033550;font-family: sans-serif;">URL</td>
            <td style="font-size: 11px;font-weight: bold;font-family: sans-serif;"><a href="http://docbook.lk/">: patients.lk</a></td>
        </tr>
        <tr>
            <td style="font-size: 11px;font-weight: bold;color: #033550;font-family: sans-serif;">Email</td>
            <td style="font-size: 11px;font-weight: bold;font-family: sans-serif;">: {{ $email or '' }}</td>
        </tr>
        <tr>
            <td style="font-size: 11px;font-weight: bold;color: #033550;font-family: sans-serif;">Password</td>
            <td style="font-size: 11px;font-weight: bold;font-family: sans-serif;">: {{ $password or ''  }}</td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <p>If you didn’t make this request, it's likely that system administrator has entered your email address by mistake and please ignore this email.</p>
@endsection