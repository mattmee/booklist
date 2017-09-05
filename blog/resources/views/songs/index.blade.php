@extends('layout.layout')

@section('title', 'Songs')

@section('body')
	{{'Songs page'}}
	@foreach ($songs as $songs)
		{{$songs->title}}
	@endforeach
@endsection
