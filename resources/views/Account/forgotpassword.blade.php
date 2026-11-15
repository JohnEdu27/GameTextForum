@extends('layouts.auth')

@section('title', 'ForgotPassword')

@section('content')

	<form method="POST" action="/forgotpassword">
		@csrf
		<div>
			<div>
				<center>
				<p class="text-lg"> Forgot password? </p>
				
				</center>
				<label> Enter Email: </label>
			</div>


			<input type="text" name="email" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Email@email.com">
			@error('email')
				<p style="color:red"> {{ $message }}</p>
			@enderror

			<button type="submit" 
                class="w-full py-3 bg-indigo-600 hover:bg-indigo-500 transition font-semibold rounded-lg shadow-lg text-white">
                Send email
            </button>
		</div>
	</form>
		<p class="text-center text-sm text-slate-400 mt-6">
				<a href="{{ url('/login') }}" class="text-indigo-400 hover:underline">Back to login</a>
			</p>
@endsection
