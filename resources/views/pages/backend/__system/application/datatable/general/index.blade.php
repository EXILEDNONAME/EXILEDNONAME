@extends('layouts.backend.__templates.index', ['datatable' => 'true', 'active' => 'true', 'activities' => 'true', 'charts' => 'true', 'date' => 'true', 'file' => 'true'])
@section('title', 'Datatable Generals')

@section('table-header')
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'description' },
@endsection