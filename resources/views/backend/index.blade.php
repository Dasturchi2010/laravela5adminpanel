@extends('backend.layouts.site')

@section('content')
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>Tabriklayman 🎉 {{auth()->user()->name}} <br> <br> Adminpanelga xush kelibsiz</h5>

                        <img src="{{ asset('backend/app-assets/images/illustration/badge.svg') }}"
                            class="congratulation-medal" alt="Medal Pic" />
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->


        </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
@endsection
