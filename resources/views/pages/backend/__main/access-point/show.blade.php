@extends('layouts.backend.datatable.__show', ['status' => 'false', 'daterange' => 'false'])
@push('title', '%%crudNameTitle%%')

@push('content-body')
<tr>
  <td> Title </td>
  <td> {{ $data->title }} </td>
</tr>
<tr>
  <td> Content </td>
  <td> {{ $data->content }} </td>
</tr>
<tr>
  <td> Category </td>
  <td> {{ $data->category }} </td>
</tr>
@endpush
