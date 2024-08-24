@extends('layouts.app')

@section('content')
@php
$title = 'Questions & Answers';
@endphp
<div class="container mx-auto bg-white shadow-inner rounded-lg mt-10 p-5 lg:px-16">
    <div class="justify-start my-10">
        <h4 class="text-3xl font-medium">There are 94 questions on this event</h4>
    </div>
    <div class="flex gap-10 flex-wrap">
        {{-- <div class="h-48 w-48 rounded-lg bg-primary">

        </div>
        <div class="h-48 w-48 rounded-lg bg-alt-green">

        </div> --}}
    </div>



</div>

@endsection
