@extends('errors::layout')

@section('title', 'Page Expired')

@section('message')
    The page has expired due to inactivity.
    <br/><br/>
    <a href="{{ route('task.regenerate') }}" style="text-decoration: none; color: inherit">Click Here To Refresh</a>
@stop