@extends('layouts.master')

@section('content')
<!-- ========== signin-section start ========== -->
<section class="signin-section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>{{trans('signin.Sign_in')}}</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper mb-30">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#0">{{trans('signin.Dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#0">{{trans('signin.Auth')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{trans('signin.Sign_in')}}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <div class="row g-0 auth-row">
            <div class="col-lg-6">
                <div class="auth-cover-wrapper bg-primary-100">
                    <div class="auth-cover">
                        <div class="title text-center">
                            <h1 class="text-primary mb-10">{{trans('signin.Welcome_Back')}}</h1>
                            <p class="text-medium">
                                {{trans('signin.Sign_in_word')}}
                            </p>
                        </div>
                        <div class="cover-image">
                            <img src="{{url('assets/images/auth/signin-image.svg')}}" alt="" />
                        </div>
                        <div class="shape-image">
                            <img src="{{url('assets/images/auth/shape.svg')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
                <div class="signin-wrapper">
                    <div class="form-wrapper">
                        <h6 class="mb-15"> {{trans('signin.Sign_In_Form')}} </h6>
                        <p class="text-sm mb-25">
                            {{trans('signin.word2')}}
                        </p>
                        <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label> {{trans('signin.Email')}} </label>
                                        <input type="email" placeholder="Email" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label> {{trans('signin.Password')}} </label>
                                        <input type="password" placeholder="Password" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                    <div class="form-check checkbox-style mb-30">
                                        <input
                                                class="form-check-input"
                                                type="checkbox"
                                                value=""
                                                id="checkbox-remember"
                                        />
                                        <label
                                                class="form-check-label"
                                                for="checkbox-remember"
                                        >
                                            {{trans('signin.remember_me_word')}} </label
                                        >
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                    <div
                                            class="
                            text-start text-md-end text-lg-start text-xxl-end
                            mb-30
                          "
                                    >
                                        <a href="#0" class="hover-underline"
                                        > {{trans('signin.Forgot_Password')}} </a
                                        >
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div
                                            class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          "
                                    >
                                        <button
                                                class="
                              main-btn
                              primary-btn
                              btn-hover
                              w-100
                              text-center
                            "
                                        >
                                            {{trans('signin.Sign_In')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                        <div class="singin-option pt-40">
                            <p class="text-sm text-medium text-center text-gray">
                                {{trans('signin.Easy_Sign_In_With')}}
                            </p>
                            <div
                                    class="
                        button-group
                        pt-40
                        pb-40
                        d-flex
                        justify-content-center
                        flex-wrap
                      "
                            >
                                <button class="main-btn primary-btn-outline m-2">
                                    <i class="lni lni-facebook-filled mr-10"></i>
                                    {{trans('signin.Facebook')}}
                                </button>
                                <button class="main-btn danger-btn-outline m-2">
                                    <i class="lni lni-google mr-10"></i>
                                    {{trans('signin.Google')}}
                                </button>
                            </div>
                            <p class="text-sm text-medium text-dark text-center">
                                {{trans('signin.Dont_have_any_account_yet')}}
                                <a href="signup.html"> {{trans('signin.Create_an_account')}} </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</section>
<!-- ========== signin-section end ========== -->
@endsection