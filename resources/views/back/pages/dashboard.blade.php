@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')

    <!-- Preloader Start  -->
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="/back/vendors/images/deskapp-logo.svg" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div>
    <!-- Preloader End  -->

    {{-- code start --}}
    <div class="row">
        <div class="col-sm-12 col-md-4 mb-30">
            <div class="card text-white bg-success card-box text-center">
                <div class="card-body">
                    <h5 class="card-title text-white">Total Admin</h5>
                    <p class="card-text">5</p>
                </div>
            </div>
        </div>
    </div>

@endsection
