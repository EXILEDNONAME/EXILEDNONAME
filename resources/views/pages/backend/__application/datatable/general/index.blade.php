@extends('layouts.backend.__templates.datatable.index', ['page' => 'datatable-index', 'activity' => 'true', 'chart' => 'true', 'status' => 'true'])
@section('title', 'Table Generals')

@section('table-header')
<th> Date </th>
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'date', 'className': 'align-middle text-nowrap', width: 1,  },
{ data: 'name' },
{ data: 'description' },
@endsection
