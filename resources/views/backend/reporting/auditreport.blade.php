@extends('backend/layout')
@section('container')

<div class="container-fluid">        
<div class="page-title">
<div class="row">
<div class="col-6">
<h3>Audit Reporting</h3>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/admin/audit-report')}}">                                       
<svg class="stroke-icon">
  <use href="{{asset('adminAsset/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
</svg></a></li>
<li class="breadcrumb-item">Audit Reporting</li>

</ol>
</div>
</div>
</div>
</div>


<div class="container-fluid">
<div class="row">

<div class="col-sm-12">
<div class="card">

  <div class="card-body">
    <div class="dt-ext table-responsive">
      <table class="display" id="export-button">
        <thead>
          <tr>
            <th>No.</th>
            <th>Email</th>
            <th>OTP</th>
            <th>PRE ELECT</th>
            <th>VP KPK</th>
            <th>VP Punjab</th>
            <th>VP Sindh</th>
            <th>SG</th>
            <th>TREASURER</th>
            <th>EXE MEM</th>
           
          </tr>
        </thead>
        <tbody>
          
           @foreach ($results as $row)
            <tr>
                <td>{{ $row->No }}</td>
                <td>{{ $row->Email }}</td>
                <td>{{ $row->OTP }}</td>
                <td>{{ $row->{'PREELECT'} }}</td>
                <td>{{ $row->{'VPKPK'} }}</td>
                <td>{{ $row->{'VPPunjab'} }}</td>
                <td>{{ $row->{'VPSindh'} }}</td>
                <td>{{ $row->SG }}</td>
                <td>{{ $row->TREASURER }}</td>
                <td>{{ $row->{'EXEMEM'} }}</td>
            </tr>
        @endforeach
          
        </tbody>
       
      </table>
    </div>
  </div>
</div>
</div>

</div>
</div>


@endsection