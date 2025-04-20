@extends('components.layout')

@section('content')
    @include('partials.hero')   {{-- Fullscreen with canvas --}}
    @include('partials.about')  {{-- Appears right under it --}}
    @include('partials.carousel') {{-- Carousel with logos --}}
    @include('partials.timeline') {{-- Timeline section --}}
    @include('partials.portfolio') {{-- Portfolio section --}}
    @include('partials.contact')
    @include('footer')
@endsection

