@extends('layout.layout')

@section('title', 'Welcome')

@section('body')
	Welcome {{$user->number}}
@endsection