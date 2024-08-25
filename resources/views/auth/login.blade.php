
@extends(isset($event) ? 'layouts.event' : 'layouts.index')

@section('content')
    <livewire:user-login />
@endsection
