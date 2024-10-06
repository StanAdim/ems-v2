@extends(isset($event) ? 'layouts.event' : 'layouts.index')

@section('content')
    <livewire:user-registration :event_title="$event->title ?? 'an Event'" />
@endsection
