@extends('front.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Document Title')
@section('meta_tags')
    {!! SEO::generate() !!}
@section('content')
    <div class="row">
			<div class="col-12">
				<div class="mb-5 d-flex align-items-center">
					<h3 class="title-color">Contact Us</h3>
					<ul class="list-inline social-icons ml-auto mr-3 d-none d-sm-block">
						<li class="list-inline-item"><a href="#!"><i class="ti-facebook"></i></a>
						</li>
						<li class="list-inline-item"><a href="#!"><i class="ti-twitter-alt"></i></a>
						</li>
						<li class="list-inline-item"><a href="#!"><i class="ti-linkedin"></i></a>
						</li>
						<li class="list-inline-item"><a href="#!"><i class="ti-github"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="content mb-5">
					<h4>We would Love To Hear From You</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit massa vitae felis augue. In venenatis scelerisque accumsan egestas mattis. Massa feugiat in sem pellentesque.</p>
					<h4 class="mt-5">Hate Forms? Write Us Email</h4>
					<p><i class="ti-email mr-2 text-primary"></i><a href="mailto:georgia.young@example.com">info@sawablog.com</a>
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<form method="POST" action="{{ route('send_email') }}">
                    @csrf
                    <x-form-alerts></x-form-alerts>
					<div class="form-group">
						<label for="name"><b class="title-color">Your Name</b> (Required):</label>
						<input type="text" name="name" id="name" class="form-control" required="" placeholder="eg: William Woods" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
					</div>
					<div class="form-group">
						<label for="email"> <b class="title-color">Your Email Address</b> (Required): </label>
						<input type="text" name="email" id="email" class="form-control" required="" placeholder="eg: williamwoods@example.com" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
					</div>
               <div class="form-group">
						<label for="subject"><b class="title-color">Reason For Contact</b>:</label>
						<input type="text" name="subject" id="subject" class="form-control" placeholder="eg: Advertising" value="{{ old('subject') }}">
                        @error('subject')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
					</div>
					<div class="form-group">
						<label for="message"><b class="title-color">Your Message Here</b>:</label>
						<textarea name="message" id="message" class="form-control" {{ old('message') ? 'value="' . old('message') . '"' : '' }}></textarea>
                        @error('message')
                            <span class="text-danger ml-1">{{ $message }}</span>
                        @enderror
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
@endsection
