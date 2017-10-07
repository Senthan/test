<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>
        @section('title')
        @show
    </title>
</head>
<body style="margin: 0px;background-color: whitesmoke;font-family: Arial;font-size: 14px;">
<table  style="width:100%;border-collapse: collapse;">
    <tr style="border-bottom:2px solid rgb(20, 105, 155);background-color:#FBFBFB;">
        <td style="width: 10%"></td>
        <td style="padding-top: 10px;">
            <a href="">
                <img alt="Teaching Hospital Jaffna" src="http://docbook.lk/assets/images/logo.png" style="width: 120px;">
            </a>
        </td>
        <td style="width: 10%"></td>
    </tr>
    <tr style="background-color:#FBFBFB;">
        <td style="width: 10%"></td>
        <td>
            <div style="padding-top: 5px;padding-bottom: 10px;padding-left: 5px;line-height: 20px;font-size: 13px;font-family: sans-serif;margin-bottom: 10px;min-height: 300px;">
                @yield('content')
            </div>
        </td>
        <td style="width: 10%"></td>
    </tr>
    <tr style="border-top: 1px solid rgb(216, 216, 216);background-color: #FBFBFB;">
        <td style="width: 10%"></td>
        <td style="padding-top: 10px;font-size: 11px;padding-bottom: 10px;color: #033550;font-family: sans-serif;">
            TM and copyright &copy; {{ date('Y') }} Teaching Hospital Jaffna, Sri Lanka.
        </td>
        <td style="width: 10%"></td>
    </tr>
</table>
</body>
</html>