@extends('layouts.backend.__templates.show', ['datatable' => 'true'])
@section('title', 'Datatable Relations')

@section('table-header')
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td> {{ $data->name }} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td> {{ $data->description }} </td>
</tr>
@endsection
