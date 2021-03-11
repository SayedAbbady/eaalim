@extends('admin.layouts.main')

@section('title')
Units
@endsection

@section('content')
<div class="content">
  <div class="card ">
    <div class="card-header">
      <div class="float-left">
        <h5 class="card-title">Unit</h5>
        <p class="card-category">Show all units </p>
      </div>
      <div class="float-right">
        <a href="{{route('unit.create')}}">
          <button class="btn btn-primary">add new unit</button>
        </a>
      </div>
    </div>
    <div class="card-body">
      @if (COUNT($units) < 1) 
      <div class="">
        <div class="alert alert-danger" role="alert">
          No units added
        </div>
      </div>
      @endif
    <div class="">
      <div class="">
        <table class="table table-hover table-striped table-bordered" id="unit-table">
          <thead class=" text-primary">
            <tr>
              <th> # </th>
              <th> Image </th>
              <th> Title </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @php $i=0;@endphp
            @foreach ($units as $key=>$item)
            <tr class="" id="{{$item->u_id}}">
              <td> {{++$i}} </td>
              <td> <img width="50px" src="{{asset(($item->u_img)?:'assets/images/newIcon.png')}}" alt=""> </td>
              <td> {{$item->u_name}} </td>
              <td> 
                <a href="{{route('unit.edit',$item->u_id)}}" class="btn btn-success"><span class="lnr lnr-pencil"></span> Edit</a> 
              
                <a href="" data-id="{{$item->u_id}}" data-token={{csrf_token()}} class="btn btn-danger deleteUnit"><span class="lnr lnr-trash"></span> Delete</a> 
              </td>
            </tr>
            @endforeach
        </table>
        
      </div>
    </div>
  </div>
  <div class="card-footer ">
    <hr>
    <div class="stats"></div>
  </div>
</div>
</div>
@endsection