@extends('layouts.backend.__templates.datatable.index', ['page' => 'datatable-index', 'active' => 'false', 'date' => 'false'])
@section('title', 'Management Users')

@section('table-header')
<th> Name </th>
<th> Email </th>
<th> Phone </th>
<th> Username </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'email' },
{ data: 'phone' },
{ data: 'username' },
@endsection
