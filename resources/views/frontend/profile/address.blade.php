@extends('layout.app')

@section('title','My Profile')

@section('content')

@foreach ($address as $profile_address)
{{$profile_address->township}}
@endforeach

@endsection

@section('scripts')

@endsection
