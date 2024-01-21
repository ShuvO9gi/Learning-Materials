@extends('layout')

@section('content')

<h2>{{$heading}}</h2>
{{-- php directive for blade --}}
{{-- @php
$test = 1;
@endphp
{{$test}} --}}

{{-- @if(count($listings) == 0)
<p>No listing found...</p>
@endif --}}

@unless(count($listings) == 0)
@foreach($listings as $listing)
<h3>
    <a href="/single-listing/{{$listing["id"]}}">
        {{$listing["title"]}}
    </a>
</h3>
<p>{{$listing["description"]}}</p>
@endforeach

@else
<p>No listing found...</p>

@endunless

@endsection