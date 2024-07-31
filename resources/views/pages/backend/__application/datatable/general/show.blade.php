@extends('layouts.backend.__templates.datatable.show', ['date' => 'true', 'status' => 'true'])
@section('title', 'Table Generals')

@push('content')
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td class="align-middle"> {!! $data->name !!} </td>
</tr>

<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td class="align-middle"> {!! nl2br(e($data->description)) !!} </td>
</tr>
@endpush
