<html lang="en">
<head>
    <title>Generate in Laravel 5.3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
<div class="container">
    <br/>
    <div class="panel panel-info">
        <div class="panel-heading">Generate PDF in Laravel 5.3</div>
        <div class="panel-body">
            <a href="#"><button type="button" class="btn btn-info btn-sm pull-right">Download PDF</button></a>
            <table class="table">
                <tr class="success">
                    <th>Name</th>
                    <th>Age</th>
                    <th>OCS No</th>
                </tr>
                    <tr>
                        <td>{{ $data['name'] }}</td>
                        <td>{{ $data['age'] }}</td>
                        <td>{{ $data['age'] }}</td>
                    </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>