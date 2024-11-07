@extends('Admin.layouts.master')
@section('css')
  @section('title')
  Companies
  @stop
@endsection
{{-- start content  --}}
@section('content')
@include('partial.error')



    <div class="page-title">
        {{-- <div class="row"> --}}
            {{-- <div class="col-sm-6">
                <h4 class="mb-0"> {{ __('site.CompUpdate') }}</h4>
            </div> --}}

            {{-- <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('companies.index') }}" class="default-color">Edit categories</a></li>
                    <li class="breadcrumb-item active">{{ __('table') }}</li>
                </ol>
            </div> --}}
        {{-- </div> --}}
    </div>
   <div class="card">
       {{-- <div class="card-header">
         <h4>Add Categorie</h4>
       </div> --}}
       <div class="card-body">
         <form action="{{ route('companies.update',$companies->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{-- @csrf --}}
            {{csrf_field()}}
            @method('PUT')

            <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{ __('site.CompUpdate') }}</h6><br>

{{-- ************** --}}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('site.CompNameAR') }}  <span class="text-danger">*</span></label>
                    <input value="{{$companies->getTranslation('name','ar')}}" type="text" name="name_ar"  class="form-control">
                    <input type="hidden" name="id" value="{{$companies->id}}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('site.CompNameEN') }} <span class="text-danger">*</span></label>
                    <input value="{{$companies->getTranslation('name','en')}}" class="form-control" name="name_en" type="text" >
                </div>
            </div>
        </div>



                 <div class="col-md-12 mb-3">
                    <label for="cat_name">{{ __('site.CompDescription') }}</label>

                        <textarea name="desc" id="" style="height: 100px" class="form-control">{{ $companies->desc }} </textarea>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="cat_name">{{ __('site.CompEmail') }}</label>
                    <input type="text"  name="email" class="form-control" value="{{ $companies->email }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cat_name">{{ __('site.CompPhone') }}</label>
                    <input type="text"  name="phone" class="form-control" value="{{ $companies->phone }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cat_name">{{ __('site.CompAddress') }} <span class="text-danger">*</label>
                    <input type="text"  name="address" class="form-control" value="{{ $companies->address }}">
                </div>


                <div class="col-md-12 mb-3">
                   <button type="submit" class="btn btn-primary">{{ __('site.Save') }}</button>
                </div>
             </div>
         </form>
       </div>
   </div>


@endsection

@section('js')

@endsection
