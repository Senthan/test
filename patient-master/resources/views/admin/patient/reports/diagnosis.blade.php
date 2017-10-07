<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('assets/admin/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .diagnosis-examination .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            border-top: none;
        }
        .diagnosis-followup {
            margin-right: 50px;
            margin-left: 20px;
            border:2px solid black;
            border-radius: 70px;
            padding: 10px;
            height: 563px;
        }
        .diagnosis-history {
            margin-right: 50px;
            margin-left: 20px;
            border:2px solid black;
            border-radius: 70px;
            padding: 10px;
            height: 200px;
        }
        .diagnosis-treatment {
            margin-right: 50px;
            margin-left: 20px;
            border:2px solid black;
            border-radius: 70px;
            padding: 10px;
            height: 678px;
        }
        .div-rotate {
            background-color: yellow;
            -ms-transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }
        .head-font-size{
            font-weight: bold;
            font-size: 28px;
            text-align: center;
            line-height: 110%;
        }
        .details-font-size{
            font-weight: bold;
            font-size: 18px;
        }

        table tr td span{
            border-bottom:1px dotted black;
        }

        .diagnosis-div{
            margin: 20px;
            border:2px solid black;
            border-radius: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
<page size="A4">
    <div class="container" style="background-color: pink;">
        <div class="row" style="margin-top: 20px;margin-bottom: 20px;">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="line-height: 40%">
                <p>Take this card when you visit Clinic</p><br/>
            </div>
            <div class="col-md-6">
                <h4 style="margin-left: 25px">Follow up Plan & Referrals</h4>
                <div class="diagnosis-followup">
                    <table width="100%" style="margin-top:50px;">
                        <tr>
                            <td width="100%"><span style=""></span></td>
                        </tr>
                        <tr>
                            <td width="100%"><span style=""></span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 15px;">
                <div class="head-font-size">
                    <p>Diagnosis Ticket</p>
                    <p>Teaching Hospital, Jaffna</p>
                    <p>University Surgical Unit</p>
                </div>
                <div class="table-responsive details-font-size">
                    <table width="100%" style="margin-top:50px;">
                        <tr>
                            <td width="70%" style="font-size: 16px;">Name } <span>{{ $patient->name  or ''}}</span></td>
                            <td style="font-size: 16px;">Age } <span>{{ $patient->age  or ''}}</span></td>
                        </tr>
                    </table>
                    <table width="100%" style="margin-top:50px;">
                        <tr>
                            <td width="35%" style="font-size: 16px;">No } <span>{{ $patient->patient_uuid  or ''}}</span></td>
                            <td width="35%" style="font-size: 16px;">ward } <span>{{ $patient->ward  or ''}}<span></td>
                            <td width="30%" style="font-size: 16px;"></td>
                        </tr>
                    </table>
                    <table width="100%" style="margin-top:50px;">
                        <tr>
                            <td width="50%" style="font-size: 16px;">Date of Admission } <span>{{ $diagnosis->admission_date  or ''}}</span></td>
                            <td width="50%" style="font-size: 16px;">Date of Discharge } <span>{{ $diagnosis->discharge_date  or ''}}<span></td>
                        </tr>
                    </table>
                </div>
                <div class="diagnosis-div">
                    <p>DIAGNOSIS : {{ $sugeryName }}</p>
                    <table width="100%" style="margin-top:50px;">
                        <tr>
                            <td width="100%"><span style=""></span></td>
                        </tr>
                        <tr>
                            <td width="100%"><span style=""></span></td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive details-font-size">
                    <table width="100%">
                        <tr>
                            <td width="25%">CONSULTANT }</td>
                            <td width="65%">
                                <strong>{{ $staff->short_name or '' }}</strong>
                                <div style="font-weight: normal; font-size:12px;line-height: 70%;">
                                    <p>[MBBS, MD(SL), MRCS (ENG)]</p>
                                    <p>{{ $designation->name or '' }}</p>
                                    <p>University Surgical Unit, Teaching Hospital, Jaffna.</p>
                                    <p>SLMC - 21067</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>CLINIC DAY }</td>
                            <td><span style="border:solid 1px black; padding:2px;">{{ $diagnosis->clinic_day or '' }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</page>
<page size="A4">
    <div class="container" style="background-color: pink;">
        <div class="row" style="margin-top: 20px;margin-bottom: 20px;">
            <div class="col-md-6">
                <h4 style="margin-left: 25px">History</h4>
                <div class="diagnosis-history">
                    <table width="100%" style="margin-left:50px;">
                        <tr>
                            <td width="100%"><span>{{ $diagnosis->history or '' }}</span></td>
                        </tr>
                    </table>
                </div>

                <h4 style="margin-left: 25px">Examination</h4>
                <div class="diagnosis-history diagnosis-examination">
                    <table width="100%" class="table table-responsive">
                        <tr>
                            @if(isset($examination->cvs_pr) && $examination->cvs_pr != '')
                                <th><span style="">PR</span></th>
                            @endif
                            @if(isset($examination->cvs_bp) && $examination->cvs_bp != '')
                                <th><span style="">BP</span></th>
                            @endif
                            @if(isset($examination->rs_spo2) && $examination->rs_spo2 != '')
                                <th width="100%"><span style="">SPO2</span></th>
                            @endif
                            @if(isset($examination->rs_lung) && $examination->rs_lung != '')
                                <th width="100%"><span style="">Lung</span></th>
                            @endif
                            @if(isset($examination->abdomen_palpation) && $examination->abdomen_palpation != '')
                                <th width="100%"><span style="">Abdomen Palpation</span></th>
                            @endif
                            @if(isset($examination->abdomen_auscultation) && $examination->abdomen_auscultation != '')
                                <th width="100%"><span style="">Abdomen Auscultation</span></th>
                            @endif
                            @if(isset($examination->abdomen_genitalia) && $examination->abdomen_genitalia != '')
                                <th width="100%"><span style="">Abdomen Genitalia</span></th>
                            @endif
                        </tr>
                        <tr>
                            @if(isset($examination->cvs_pr) && $examination->cvs_pr != '')
                                <td width="100%"><span style="">{{ $examination->cvs_pr or '' }}</span></td>
                            @endif
                            @if(isset($examination->cvs_bp) && $examination->cvs_bp != '')
                                <td width="100%"><span style="">{{ $examination->cvs_bp or '' }}</span></td>
                            @endif
                            @if(isset($examination->rs_spo2) && $examination->rs_spo2 != '')
                                <td width="100%"><span style="">{{ $examination->rs_spo2 or '' }}</span></td>
                            @endif
                            @if(isset($examination->rs_lung) && $examination->rs_lung != '')
                                <td width="100%"><span style="">{{ $examination->rs_lung or '' }}</span></td>
                            @endif
                            @if(isset($examination->abdomen_palpation) && $examination->abdomen_palpation != '')
                                <td width="100%"><span style="">{{ $examination->abdomen_palpation or '' }}</span></td>
                            @endif
                            @if(isset($examination->abdomen_genitalia) && $examination->abdomen_genitalia != '')
                                <td width="100%"><span style="">{{ $examination->abdomen_genitalia or '' }}</span></td>
                            @endif
                            @if(isset($examination->abdomen_auscultation) && $examination->abdomen_auscultation != '')
                                <td width="100%"><span style="">{{ $examination->abdomen_auscultation or '' }}</span></td>
                            @endif
                        </tr>
                    </table>
                    <table width="100%" class="table table-responsive">
                        <tr>
                            @if(isset($examination->abdomen_dre) && $examination->abdomen_dre != '' && count(json_decode($examination->abdomen_dre)))
                                <th><span style="">Abdomen Dre :</span></th>
                                <td>
                                    @foreach(json_decode($examination->abdomen_dre) as $dre)
                                        <span style="">{{ $dre or '' }}, </span>
                                    @endforeach
                                </td>
                            @endif
                        </tr>
                    </table>
                </div>
                <h4 style="margin-left: 25px">Investigation</h4>
                <div class="diagnosis-history">
                    <table width="100%" style="margin-left:50px;">
                        <tr>
                            <td><span style=""></span></td>
                        </tr>
                        <tr>
                            <td><span style=""></span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h4 style="margin-left: 25px">Treatment</h4>
                <div class="diagnosis-treatment">
                    <table width="100%" style="margin-top:50px;">
                        <tr>
                            <td width="100%">
                                <span style="">
                                @if($treatment)
                                    {!! $treatment !!}
                                @endif
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</page>
</body>
</html>