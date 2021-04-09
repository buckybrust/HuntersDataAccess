@extends ('layout')

@section ('head')
<style>
    a{
        color:black;
    }
</style>
@endsection

@section ('content')
    <div class="w-full md:w-3/4 bg-white m-auto rounded-xl border-2 border-gray-200">
	<div class="flex items-center space-x-4 justify-center bg-gray-100 rounded-t-xl py-2">
		<div class="float-left text-3xl">
			<h1>Employees</h1>
		</div>
		<div class="float-left ">
			<h2><a href="employees/create" class="mt-8">Create</a></h2>
		</div>
	</div>
	<hr class=" clear-both">
	<div id="main" class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-4 flex">

    @forelse ($employees as $employee)
    <div class="p-4">
    <a href="/employees/{{$employee->id}}" class="hover:text-gray-500 hover:no-underline">
        <h3 class="text-3xl">{{$employee->fname}} {{$employee->lname}}</h3>
        <p class="text-md">{{$employee->email}} {{$employee->phone}}</p>
        <p class="text-md">Employed By: {{$employee->business->name}}</p>
    </a>
    </div>
    @empty
        <p>No relevant employees yet</p>
    @endforelse

    {{ $employees->links() }}
@endsection