@if(!empty(config('thawani.views.layout')))
    @include('ThawaniLaravel::layouts.adapter')
@endif
@extends(!empty(config('thawani.views.layout'))? config('thawani.views.layout') : 'ThawaniLaravel::layouts.app')
@section(!empty(config('thawani.views.section'))? config('thawani.views.section') : 'content')
    Payment has been canceled
@endsection
