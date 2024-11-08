@extends('layouts.master')
@section('css')

@section('title')
{{trans('main_trans.Add_Parent')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

@section('PageTitle')
    {{trans('main_trans.Add_Parent')}}
@stop
@endsection


<!-- breadcrumb -->

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">


                @livewire('add-parent')

        {{--    طريقة ثانية لاستدعاء الصفحة
                <livewire:add-parent/>--}}


            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @livewireScripts   <!-- JS for livewire -->
@endsection
