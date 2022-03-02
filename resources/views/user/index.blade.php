@extends('template/header')


@section('content')

<!-- Modal -->
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 ">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary mb-2"  data-toggle="modal" data-target="#formInputModal"><i class="ni ni-fat-add"></i> Tambah Data User</button>
                    </div>
                     @include('user/form') 
                </div>
            </div>
        </div>
    </div>
</div>

@include('user/list-all')



@endsection