@extends('layouts.backend.__templates.datatable.show')
@section('title', 'Management Roles')

@push('content')
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td class="align-middle"> {!! $data->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Guard Name </td>
  <td class="align-middle"> {!! $data->guard_name !!} </td>
</tr>
@endpush
