@extends('layouts.backend.__templates.index')
@section('title', 'Management Users')

@section('table-header')
<th> Name </th>
<th> Username </th>
<th> Email </th>
<th> Phone </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'username' },
{ data: 'email' },
{ data: 'phone' },
@endsection
