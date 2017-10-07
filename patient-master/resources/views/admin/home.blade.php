@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="logo-wrapper">
                <img src="{{ asset('assets/images/logo.png') }}" class="logo">
            </div>
            <h1 class="text-center dashboard">Welcome to Admin Panel</h1>
        </div>
    </div>
@endsection
@section('script')
    <script>
//        new Notification("Admin: Hi", { tag: 'welcome to Admin panel' });
    </script>
@endsection
