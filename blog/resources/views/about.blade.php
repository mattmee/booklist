@extends('layout.layout')

@section('title', 'About')

@section('body')
	@foreach($test as $test) 
		{{$test}}
	@endforeach
@endsection