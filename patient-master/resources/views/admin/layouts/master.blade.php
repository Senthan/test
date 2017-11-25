<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teaching Hospital | Admin Panel</title>
    <link href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/angular-ui-grid/ui-grid.min.css') }}" rel="styleSheet">
    <link href="{{ asset('components/ui-select/dist/select.min.css') }}" rel="styleSheet">
    <link href="{{ asset('components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/semantic-ui-button/button.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/semantic-ui-dropdown/dropdown.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/semantic-ui-transition/transition.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/semantic-ui-icon/icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/semantic-ui-label/label.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/semantic-ui-checkbox/checkbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/ezdz/src/jquery.ezdz.css') }}" rel="stylesheet">
    <link href="{{ asset('components/ng-tags-input/ng-tags-input.css') }}" rel="stylesheet">
    <link href="{{ asset('components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/fullcalendar-scheduler/dist/scheduler.css') }}" rel="stylesheet">
    <link href="{{ asset('components/orgchart/dist/css/jquery.orgchart.css') }}" rel="stylesheet">
    <link href="{{ asset('components/semantic/dist/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/master.css') }}" rel="stylesheet">

</head>
<body id="app-layout">
    @include('admin.layouts.header')
    <div id="app" class="container">
        @include('flash::message')

        @yield('content')
    </div>
    @include('admin.layouts.footer')
    @if(auth()->check())
        @include('admin.chat.popup')
    @endif
    <script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('components/angular/angular.js') }}"></script>
    <script src="{{ asset('components/angular-touch/angular-touch.js') }}"></script>
    <script src="{{ asset('components/angular-ui-grid/ui-grid.min.js') }}"></script>
    <script src="{{ asset('components/moment/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('components/angular-file-upload/dist/angular-file-upload.js') }}"></script>
    <script src="{{ asset('components/socket.io-client/socket.io.js') }}"></script>
    <script src="{{ asset('components/Chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/chat.js') }}"></script>
    <script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('components\semantic\dist\semantic.js') }}"></script>
    <script src="{{ asset('components/ezdz/src/jquery.ezdz.js') }}"></script>
    <script src="{{ asset('components/csv-js/csv.js') }}"></script>
    <script src="{{ asset('components/pdfmake/build/pdfmake.js') }}"></script>
    <script src="{{ asset('components/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('components/angular-local-storage/dist/angular-local-storage.min.js') }}"></script>
    <script src="{{ asset('components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('components/fullcalendar-scheduler/dist/scheduler.min.js') }}"></script>

    <script>
        var dateTimePicker;
        var DatePicker;
        var TimePicker;
        var formSubmissionHandled = false;
        function setCookie(cname, cvalue, hours) {
            var d = new Date();
            d.setTime(d.getTime() + (hours * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        var app = angular.module('app', ['LocalStorageModule', 'ngTouch', 'ui.grid', 'ui.grid.grouping', 'ui.grid.expandable', 'ui.grid.pinning', 'ui.grid.selection', 'ui.grid.pagination', 'ui.grid.resizeColumns', 'ui.grid.moveColumns', 'ui.grid.autoResize', 'ui.grid.edit', 'angularFileUpload', 'ui.grid.exporter', 'ui.grid.resizeColumns', 'ui.grid.moveColumns']);
        app.run(['$http', function ($http) {
            $http.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
//            $http.defaults.cache = false;
        }]).config(function ($httpProvider, localStorageServiceProvider) {
            localStorageServiceProvider
                .setPrefix('grid-demo')
                .setStorageType('localStorage')
                .setNotify(true, true); // Not sure what this setting does
        });

        var gridOptions = {
            enableSorting: true,
            enableFiltering: true,
            paginationPageSizes: [10, 30, 50, 100],
            paginationPageSize: 30,
            enableRowSelection: true,
            enableSelectAll: true,
            selectionRowHeaderWidth: 35,
            rowHeight: 35,
            multiSelect:false,
            columnDefs: [
            ]
        };

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $(".ui.accordion").accordion();
            dateTimePicker = $('.date-time-picker').datetimepicker({
                sideBySide: true,
                format: 'YYYY-MM-DD H:mm:ss'
            });
            DatePicker = $('.date-picker').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            TimePicker = $('.time-picker').datetimepicker({
                format: 'LT'
            });

        });

        $('.ui.checkbox').checkbox();
    </script>
    @section('script')

    @show
    @section('chat-script')

    @show
</body>
</html>