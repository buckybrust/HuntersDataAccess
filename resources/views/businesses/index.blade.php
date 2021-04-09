@extends ('layout')

@section('head')
<style>
</style>
@endsection

@section ('content')
<div class="w-full md:w-3/4 bg-white m-auto rounded-xl border-2 border-gray-200">
	<div class="flex items-center space-x-4 justify-center bg-gray-100 rounded-t-xl py-2">
		<div class="float-left text-3xl">
			<h1>Businesses</h1>
		</div>
		<div class="float-left ">
			<h2><a href="businesses/create" class="mt-8">Create</a></h2>
		</div>
	</div>
	<hr class=" clear-both">
	<div id="main" class="grid lg:grid-cols-2 grid-cols-1 gap-4 flex">


		@forelse ($businesses as $business)

		<div class="flex">
			<a href="/businesses/{{$business->id}}">
				<div class="float-left p-2">
					<img src="/storage/{{$business->logo}}" style="width:100px;">
				</div>
				<div class="float-left align-middle py-3">
					<h3 class="text-xl">{{$business->name}}</h3>
					<p>{{$business->email}}</p>
				</div>
			</a>
		</div>

		@empty
		<p class="text-lg py-12 px-4">No Businesses Here! <a href="/businesses/create">Create One!</a></p>
		@endforelse




	</div>
	<div class="bg-gray-200">{{ $businesses->links() }}</div>
</div>
@endsection
