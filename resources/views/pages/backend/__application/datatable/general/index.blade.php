@extends('layouts.backend.template.datatable.index', ['page' => 'datatable-index', 'activity' => 'true', 'chart' => 'true', 'status' => 'true', 'active' => 'false'])
@section('title', 'Table Generals')

@section('table-header')
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'description' },
@endsection
