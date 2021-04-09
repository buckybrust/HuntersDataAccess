@extends ('layout')
@section ('content')
<div class="w-full sm:w-2/3 md:w-1/2 bg-white m-auto rounded-xl border-2 border-gray-200">
	<div class="flex items-center space-x-4 justify-center bg-gray-100 rounded-t-xl py-2">
		<div class="float-left text-3xl">
			<h1>Employee Info</h1>
		</div>
	</div>
	<hr class="clear-both">

    <div class="w-2/3 float-left px-4">
        <h2 class="text-lg mt-3"><b>First Name:</b> {{$employee->fname}}</h2>
        <h2 class="text-lg"><b>Last Name:</b> {{$employee->lname}}</h2>
        <p class="text-lg"><b>Email: </b>{{$employee->email}}</p>
        <p class="text-lg"><b>Phone: </b>{{$employee->phone}}</p>
    </div>
    <div class="w-1/3 float-left px-4">
        <p class="text-lg"><b>Employed By:</b></p>
        <p> <a href="/businesses/{{$employee->business->id}}">{{$employee->business->name}}</a></p>
        <img src="/storage/{{$employee->business->logo}}" style="width:100px;">
    </div>
    
    

    <div class="grid grid-cols-3 flex clear-both bg-gray-100 rounded-b-lg text-center py-2">
        
        <div>
            <p class="text-xl "><a href="/employees/{{$employee->id}}/edit" class="hover:text-gray-500 hover:no-underline">Edit Employee</a></p>
        </div>
        <div>
            <form method="POST" action="/employees">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" value="{{$employee->id}}" style="opacity:0;">
                <button type="submit"><p class="text-xl hover:text-gray-500 hover:no-underline">Delete Employee</p></button>
            </form>
        </div>
        <div>
            <p class="text-xl "><a href="/businesses/{{$employee->business->id}}" class="hover:text-gray-500 hover:no-underline">Go To Business</a></p>
        </div>
    </div>
</div>
@endsection