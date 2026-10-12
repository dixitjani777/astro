@extends('frontend.themes.light.layouts.master')

@section('title', 'Ask query to astrologer : Accurate predictions - Astroduniya')
@section('description', 'Get in touch with our best astrologer who are best in world and provide accurate predictions.')
@section('keywords', 'astrologer near me, ask astrologer, ask astrologer free, ask astrologer free question, ask astrologer online, Ask query to astrologer, astrologer prediction, astrologer online, famous astrologer near me, world best astrologer')

@section('content')
<section class="hs_indx_title_main_wrapper">
    <div class="hs_title_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 full_width">
                <div class="hs_indx_title_left_wrapper"><h2>Ask to our astrologer</h2></div>
            </div>
            <div class="col-lg-12 full_width">
                <div class="hs_indx_title_right_wrapper">
                    <ul><li><a href="{{ url('/') }}">Home</a> &nbsp;&nbsp;&nbsp;&gt;</li><li>Ask Free Query</li></ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="light-legacy-inner-section light-pandit-book light-query-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1">
                <div>
                    <span class="sub_heading letter-spacing-1 badge badge-pill badge-primary badge-soft font-weight-medium pl-2 pr-2 pt--6 pb--6 mb-2 fs--15">Follow 3 Steps</span><br/><br/>
                    <div class="d-flex mb-3">
                        <div class="badge badge-ico-sm rounded-circle float-start"><i class="fi fi-arrow-right"></i></div>
                        <p class="text-dark font-weight-light mb-0 pl--12 pr--12">@auth You are logged in @else Login / Sign Up @endauth</p>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="badge badge-ico-sm rounded-circle float-start"><i class="fi fi-arrow-right"></i></div>
                        <p class="text-dark font-weight-light mb-0 pl--12 pr--12">Fill out below form</p>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="badge badge-ico-sm rounded-circle float-start"><i class="fi fi-arrow-right"></i></div>
                        <p class="text-dark font-weight-light mb-0 pl--12 pr--12">Check query status in your Account</p>
                    </div>
                </div>

                <div class="clearfix mt-5">
                    <h3 class="font-weight-normal text-muted mb-4">Enter Details</h3>
                    @guest
                        <p class="text-muted sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft fs--15 mb-1"><span class="styleColor">*</span> You must <a href="{{ url('/account') }}">Log in</a> to ask free query.</p>
                    @endguest

                    <x-enquiry-form
                        layout="floating"
                        class="bs-validate d-block bg-white shadow-primary-xs rounded p-4 mb-5"
                        source="query"
                        context="ask_free_query"
                        subject="Astrology Query"
                        :show-name="false"
                        :show-email="false"
                        :show-phone="false"
                        message-label="Enter your query here.."
                        submit-label="Submit Query"
                    >
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-label-group mb-3">
                                    <input required placeholder="Name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()?->name) }}" data-toggle="tooltip" data-placement="top" data-original-title="Name">
                                    <label>Name</label>
                                    @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-label-group mb-3">
                                    <select id="select_options2" class="form-control" name="meta[gender]">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <label for="select_options2">Gender</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-label-group mb-3">
                                    <input required autocomplete="off" type="text" name="meta[dob_time]" class="form-control rangepicker" placeholder="Date of Birth and Time" data-toggle="tooltip" data-placement="top" data-original-title="Date of Birth and Time" data-layout-rounded="false" data-single-datepicker="true" data-interval-years='[1982,2020]' data-timepicker="true" data-date-format="DD/MM/YYYY hh:mm: A" data-quick-locale='{"lang_apply":"Apply","lang_cancel":"Cancel","lang_crange":"Custom Range","lang_months":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"lang_weekdays":["Su","Mo","Tu","We","Th","Fr","Sa"]}'>
                                    <label for="comment_name">Date of Birth and Time</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-label-group mb-3">
                                    <input required placeholder="Birth Place" id="timepickerT" type="text" class="form-control" name="meta[birth_place]" data-astro-location="birth_place" data-toggle="tooltip" data-placement="top" data-original-title="Birth Place" autocomplete="off">
                                    <label for="comment_name">Birth Place</label>
                                    <span class="fs--14 styleColor letter-spacing-03">* Select location from the list only.</span>
                                    <input type="hidden" name="meta[birth_place_details][display_name]" value="{{ old('meta.birth_place_details.display_name') }}">
                                    <input type="hidden" name="meta[birth_place_details][city]" value="{{ old('meta.birth_place_details.city') }}">
                                    <input type="hidden" name="meta[birth_place_details][state]" value="{{ old('meta.birth_place_details.state') }}">
                                    <input type="hidden" name="meta[birth_place_details][country]" value="{{ old('meta.birth_place_details.country') }}">
                                    <input type="hidden" name="meta[birth_place_details][lat]" value="{{ old('meta.birth_place_details.lat') }}">
                                    <input type="hidden" name="meta[birth_place_details][lon]" value="{{ old('meta.birth_place_details.lon') }}">
                                </div>
                            </div>
                        </div>
                    </x-enquiry-form>

                    <p class="light-query-note"><strong>Note:</strong> Your query will be answered very shortly and Will notify on your registered Email or Mobile.</p>
                </div>

                <section class="light-query-how-it-works">
                    <h2>How It works ?</h2>
                    <p>Our astrologer conclude the solutions by understanding your birth chart with the best skills.</p>
                    @foreach ([
                        'Examine the Sun at the time you were born.',
                        'Examine twelve houses of your birth chart.',
                        'Examine your strength and weaknesse.',
                        'Recognize your characteristics.',
                        'Examine your Horoscope with best technique.',
                        'Follow the best principle of astrology.',
                        'Suggest accurate powerfull gemstones.',
                        'Suggest Puja if any required.'
                    ] as $step)
                        <div class="light-query-benefit"><span>✓</span><p>{{ $step }}</p></div>
                    @endforeach
                </section>
            </div>

            <aside class="col-lg-3 order-2">
                @include('frontend.query.sidebar.query_sidebar')
            </aside>
        </div>
    </div>
</section>
@endsection
