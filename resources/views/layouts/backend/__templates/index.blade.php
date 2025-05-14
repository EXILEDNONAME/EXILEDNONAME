@extends('layouts.backend.default')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <!--begin::Example-->
    <!--begin::Card-->
    <div class="card card-custom" data-card="true" id="kt_card_1">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> Main </h3>
        </div>
        <div class="card-toolbar">
          <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
            <i class="ki ki-arrow-down icon-nm"></i>
          </a>
          <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="Reload Card">
            <i class="ki ki-reload icon-nm"></i>
          </a>
          <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary" data-card-tool="remove" data-toggle="tooltip" data-placement="top" title="Remove Card">
            <i class="ki ki-close icon-nm"></i>
          </a>
        </div>
      </div>
      <div class="card-body">

        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
          <thead>
            <tr>
              <th>Record ID</th>
              <th>Country</th>
              <th>Ship City</th>
              <th>Ship Address</th>
              <th>Company Agent</th>
              <th>Company Name</th>
              <th>Ship Date</th>
              <th>Status</th>
              <th>Type</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td>50</td>
              <td>China</td>
              <td>Zhulan</td>
              <td>55385 Stoughton Trail</td>
              <td>Sheryl Giddings</td>
              <td>Grimes, Ryan and Larkin</td>
              <td>9/15/2017</td>
              <td>3</td>
              <td>1</td>
              <td nowrap></td>
            </tr>
          </tbody>

        </table>

      </div>
    </div>

  </div>

</div>
@endsection
