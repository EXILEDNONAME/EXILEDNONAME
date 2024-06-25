@extends('layouts.backend.__templates.datatable.index', ['page' => 'datatable-index'])
@section('title', 'Management Permissions')

@section('table-header')
<th> Name </th>
@endsection

@section('table-body')
{ data: 'name' },
@endsection
