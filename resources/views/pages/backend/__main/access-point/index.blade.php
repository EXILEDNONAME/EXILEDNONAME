@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'date' => 'false', 'activities' => 'true', 'charts' => 'true'])
@push('title', '%%crudNameTitle%%')

@push('table-header')
<th> Title </th> 
<th> Content </th> 
<th> Category </th> 
@endpush

@push('table-body')
{ data: 'title' }, 
{ data: 'content' }, 
{ data: 'category' }, 
@endpush
