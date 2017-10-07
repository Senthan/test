<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('assets/admin/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <page size="A4">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center" style="font-weight: bold; font-size: 30px;">TEACHING HOSPITAL, JAFFNA</p>
            </div>
            <div class="col-md-12" style="margin: auto;">
                <p class="text-center" style="font-weight: bold; font-size: 18px;"><span style="border: 2px solid #000; border-radius: 10%; padding: 5px 15px;">LIST OF OPERATIONS</span></p>
            </div>
            <div class="col-md-12">
                <p style="font-weight: bold; font-size: 14px;">Name of the Consultant : </p>
            </div>
            <div class="col-md-12">
                <div style="width: 66%; position: relative;" class="pull-left">
                    <p style="font-weight: bold; font-size: 14px;">Date : </p>
                    <p style="font-weight: bold; font-size: 14px;">Time : </p>
                    <p style="font-weight: bold; font-size: 14px;">List to : </p>
                </div>
                <div style="width: 33%; position: relative;" class="pull-right">
                    <p style="font-weight: bold; font-size: 14px;" class="text-center"><span class="pull-left">Local</span> / <span class="pull-right">General</span></p>
                    <p style="font-weight: bold; font-size: 14px;" class="text-center"><span class="pull-left">Anaesthesis</span> / <span class="pull-right">Anaesthesis</span></p>
                    <p style="font-weight: bold; font-size: 14px;" class="text-center"><span class="pull-left">Rourine</span> / <span class="pull-right">Casuaity</span></p>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="2%" class="text-center">Serial No</th>
                        <th width="38%" class="text-center">Name</th>
                        <th width="2%" class="text-center">Age</th>
                        <th width="8%" class="text-center">Sex</th>
                        <th width="7%" class="text-center">Ward</th>
                        <th width="8%" class="text-center">B.H.T</th>
                        <th width="15%" class="text-center">Diagnosis</th>
                        <th width="20%" class="text-center">Type of Surgery</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($patients) && count($patients))
                        @foreach($patients as $key => $patient)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $patient->name }}</td>
                                <td class="text-center">{{ $patient->age }}</td>
                                <td class="text-center">{{ $patient->sex }}</td>
                                <td class="text-center">{{ $patient->ward }}</td>
                                <td class="text-center">{{ $patient->B_H_T }}</td>
                                <td class="text-center">{{ $patient->description }}</td>
                                <td class="text-center">{{ $patient->surgeryType->last() ? $patient->surgeryType->last()->name : '' }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </page>
</body>
</html>
@section('script')
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
@endsection