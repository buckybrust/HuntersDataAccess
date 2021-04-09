@extends ('layout')
@section ('content')
<div class="w-full sm:w-2/3 md:w-1/2 bg-white m-auto rounded-xl border-2 border-gray-200">
	<div class="flex items-center space-x-4 justify-center bg-gray-100 rounded-t-xl py-2">
		<div class="float-left text-3xl">
			<h1>Business Info</h1>
		</div>
	</div>
	<hr class="clear-both">

    <div class="w-3/4 float-left px-4">
        <h2 class="text-lg mt-3"><b>Title:</b> {{$business->name}}</h2>
        <p class="text-lg"><b>Email:</b> {{$business->email}}</p>
    

        <p class="text-lg font-bold">Employees:</p>
        
            @forelse ($business->employees as $employee)
            <p class="text-lg">
            <a href="/employees/{{$employee->id}}">{{$employee->fname}} {{$employee->lname}}</a>
            </p>
            @empty
                <p>No Employees Listed Yet</p>
            @endforelse
            <a href="/employees/create?employer={{$business->id}}">Create An Employee</a>
        
    
    </div>
    <div class="w-1/4 float-left">
            <img src="/storage/{{$business->logo}}" class="m-auto">
    </div>

    


    <div class="grid grid-cols-3 flex clear-both bg-gray-100 rounded-b-lg text-center py-2">
        <div>
            <p class="text-xl "><a href="/employees/create?employer={{$business->id}}" class="hover:text-gray-500 hover:no-underline">Add Employee</a></p>
        </div>
        <div>
            <p class="text-xl "><a href="/businesses/{{$business->id}}/edit" class="hover:text-gray-500 hover:no-underline">Edit Business</a></p>
        </div>
        <div>
            <form method="POST" action="/businesses">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" value="{{$business->id}}" style="opacity:0;">
                <button type="submit"><p class="text-xl hover:text-gray-500 hover:no-underline">Delete Business</p></button>
            </form>
        </div>
    </div>
</div>
@endsection