@extends('layouts.backend.__templates.index', ['datatable' => 'true', 'active' => 'true', 'activities' => 'true', 'charts' => 'true', 'date' => 'true', 'file' => 'true'])
@section('title', 'Datatable Relations')

@section('table-header')
<th> Description </th>
@endsection

@section('table-body')
{ data: 'description' },
@endsection