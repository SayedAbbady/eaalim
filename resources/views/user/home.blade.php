@extends('user.layout')

@section('title')
Eaalim syllabus
@endsection

@section('content')
@include('user.navbar')
<br>
<br>
<br>
<div class="container">
  <div class="alert alert-success">
    <b> Hello </b> with Eaalim
  </div>
  <br>
  <h2> Learning Track </h2>
  <hr>

  <?php 
    if($units->count() != 0){
        foreach ($units as $unit) {
            ?>
  <!-- unit -->
  <div class="col-12 text-center">
    <img src="{{asset('/'.$unit->u_img??"assets/images/newIcon.png")}}" style="width:200px;height:200px;"
      class="rounded-circle img-fluid mx-auto d-block">
    <h4>
      <?php echo $unit->u_name?>
    </h4>
    <br>
  </div>
  <div class="row">
    <?php 
    $sections = \Illuminate\Support\Facades\DB::table('sections')
                         ->where('s_unit', '=', $unit->u_id)
                         ->get();

    if($sections->count() != 0){
        foreach ($sections as $section) {
            ?>
    <!-- section -->
    <div class="col-md-4 text-center">
      <div class="bord">
        <br>
        <img src="{{asset('/'.$section->s_img??"assets/images/newIcon.png")}}"
          style="width:100px;height:100px;" class="rounded-circle img-fluid mx-auto d-block">
        <h5>
          
          <p>
            <a href="{{route('section_show',$section->s_id)}}">
              <?php echo $section->s_name?>
            </a>
          </p>
          <small style="color:green"><i class="fa fa-unlock"></i> UnLocked </small>
          
        </h5>
      </div>
      <br>
    </div>
    <!-- section -->
    <?php
        }
    }
?>



  </div>
  <br>
  <br>
  <!-- unit -->
  <?php
        }
    }
?>


</div>
@endsection