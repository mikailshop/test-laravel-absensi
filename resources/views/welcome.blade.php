@extends('layouts.app')

@section('content')

<!-- start banner Area -->
<section class="banner-area relative" id="home" style="background: url('/images/desk-work.png')";>
	<div class="overlay overlay-bg"></div>	
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-between">
				<div class="banner-content col-lg-9 col-md-12">
					<h1 class="strong colored-text">
						{{config('bakoel.welcome_massage')}}
					</h1>
					<p class="text-uppercase pt-10 pb-10">
						{{config('bakoel.sub_welcome_massage')}}
					</p>
					<a href="{{config('bakoel.welcome_massage_button_url')}}" class="primary-btn text-uppercase">{{config('bakoel.welcome_massage_button_text')}}</a>
				</div>										
			</div>
		</div>
	</div>				
</section>
<!-- End banner Area -->

<!-- Start feature Area -->
<section class="feature-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="single-feature">
					<div class="title">
						<h4>{{config('bakoel.home_feature_column_1_title')}}</h4>
					</div>
					<div class="desc-wrap">
						<p>
							{{config('bakoel.home_feature_column_1_content')}}
						</p>
						<a href="{{config('bakoel.home_feature_column_1_link_url')}}">{{config('bakoel.home_feature_column_1_link_text')}}</a>									
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-feature">
					<div class="title">
						<h4>{{config('bakoel.home_feature_column_2_title')}}</h4>
					</div>
					<div class="desc-wrap">
						<p>
							{{config('bakoel.home_feature_column_2_content')}}
						</p>
						<a href="{{config('bakoel.home_feature_column_2_link_url')}}">{{config('bakoel.home_feature_column_2_link_text')}}</a>									
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-feature">
					<div class="title">
						<h4>{{config('bakoel.home_feature_column_3_title')}}</h4>
					</div>
					<div class="desc-wrap">
						<p>
							{{config('bakoel.home_feature_column_3_content')}}
						</p>
						<a href="{{config('bakoel.home_feature_column_3_link_url')}}">{{config('bakoel.home_feature_column_3_link_text')}}</a>									
					</div>
				</div>
			</div>												
		</div>
	</div>	
</section>
<!-- End feature Area -->
@endsection