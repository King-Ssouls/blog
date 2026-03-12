@if(Auth::check())
    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" width="40">
@endif