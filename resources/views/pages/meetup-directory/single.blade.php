@extends('layouts.main')

@section('page_title', 'Meetup')

@section('content')

<div>This meetup is organised by {{ $meetup->user->name }}.</div>

@endsection