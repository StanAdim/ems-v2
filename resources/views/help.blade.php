<?php
/**
 * @var \App\Models\EventModel $event
 */
?>

@extends('layouts.event')

@section('content')
    <div class="container mx-auto grid grid-cols-1 py-10 lg:py-20">
        @if ($event->helpDescription)
            <div class="ml-2 grid gap-5 px-8 md:ml-0">
                <div class="pr-10 md:pr-20">
                    <p class="mb-2 text-3xl font-light">
                        {!! $event->helpTitle !!}
                    </p>
                </div>

                <div class="pr-10 md:pr-20">
                    {!! $event->helpDescription !!}
                </div>
            </div>
        @else
            <div class="ml-2 grid gap-5 px-5 md:ml-0">
                <div class="pr-10 md:pr-20">
                    <p class="mb-2 text-3xl font-light">
                        Here are the key information ICT stakeholders attending <br />
                        the {{ $event->title }} should be aware of:
                    </p>
                </div>


                <div class="pr-10 md:pr-20">
                    <p class="mb-2 text-lg font-semibold">
                        1. Dates and Venue:
                    </p>
                    <p>
                        {{ $event->linkTitle }} will be held in {{ $event->locationDescription }} from
                        {{ $event->getDateRangeDescription() }}.
                    </p>

                    <p class="mb-2 mt-10 text-lg font-semibold">
                        2. Main Theme:
                    </p>
                    <p>
                        The theme for this year’s conference is " {{ $event->theme }}"
                    </p>
                </div>
            </div>
        @endif
    </div>
@endsection
