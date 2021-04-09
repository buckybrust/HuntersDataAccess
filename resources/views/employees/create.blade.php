@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection


@section('content')
    <div id="wrapper">
        <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">New Employee</h1>

        <form method="POST" action="/employees">
            @csrf
            <div class="field">
                <label class="label" for="fname">First Name</label>

                <div class="control">
                    <input 
                    class="input @error('fname') is-danger @enderror" 
                    type="text" 
                    name="fname" 
                    id="fname"
                    value="{{old('fname')}}">
                    @error('fname')
                        <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="lname">Last Name</label>

                <div class="control">
                    <input 
                    class="input @error('lname') is-danger @enderror" 
                    type="text" 
                    name="lname" 
                    id="lname"
                    value="{{old('lname')}}">
                    @error('lname')
                        <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="email">Email</label>

                <div class="control">
                    <input 
                    class="input @error('email') is-danger @enderror" 
                    type="email" 
                    name="email" 
                    id="email"
                    value="{{old('email')}}">
                    @error('email')
                        <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="phone">Phone</label>

                <div class="control">
                    <input 
                    class="input @error('phone') is-danger @enderror" 
                    type="tel" 
                    name="phone" 
                    id="phone"
                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                    placeholder="000-000-0000"
                    value="{{old('phone')}}">
                    @error('phone')
                        <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="business_id">Employed By:</label>

                <div class="select is-multiple control">
                    <select name="business_id" id="business_id" required>

                        @foreach ($businesses as $business)
                            @if ($business->id == $employer)
                            <option value="{{$business->id}}" selected>{{$business->name}}</option>
                            @else
                            <option value="{{$business->id}}">{{$business->name}}</option>
                            @endif
                        @endforeach

                    </select>
                    @error('business')
                        <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
                @forelse ($businesses as $business)
                @empty
                    <p>A Business Must Be Created: <a href="/businesses/create">Follow Link Here To Create One</a></p>
                @endforelse
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </div>
        
    </div>
@endsection