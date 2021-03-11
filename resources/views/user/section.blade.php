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
  <h2> <?php echo $sec[0]->s_name;?> </h2>
  <hr>

  
<!-- unit -->
<div class="col-12 text-center">
  <img src="{{asset('/'.$sec[0]->s_img)}}" style="width:200px;height:200px;" class="rounded-circle img-fluid mx-auto d-block">
  <h4> <?php echo $sec[0]->s_name?> </h4>
  <br>
</div>
<div class="row">
  <?php 
      $levels = \Illuminate\Support\Facades\DB::table('levels')
                      ->where('l_section', '=', $sec[0]->s_id??1)
                      ->get();
    

      if($levels->count() != 0){
          foreach ($levels as $level) {
              
              ?>
                  <!-- level -->
                  <div class="col-md-3 text-center">
                      <div class="bord">
                      <br>
                      <h5> 
                          <?php 
                      
                              if($level->l_is_free == 1){
                                  ?>
                                  <img src="{{asset('/'.$level->l_img)}}" style="width:100px;height:100px;" class="rounded-circle img-fluid mx-auto d-block">
                                  <p>
                                      <a href="{{route('level_show',$level->l_id)}}"> <?php echo $level->l_name?> </a>
                                  </p>
                                  <small style="color:green"><i class="fa fa-unlock"></i> UnLocked </small>
                                  <?php
                              }else{
                                  
                                ?>
                                <img src="{{asset('/'.$level->l_img)}}" style="width:100px;height:100px;filter: grayscale(100%);" class="rounded-circle img-fluid mx-auto d-block">
                                <p> <?php echo $level->l_name?> </p>
                                <small><i class="fa fa-lock"></i> Locked </small>
                                <?php
                                  
                                  
                              }
                          ?>    
                      </h5>
                      </div> 
                  </div>
                  <!-- level -->
              <?php
          }
      }
  ?>
  


</div>
<br>
<br>
<!-- unit -->



</div>
@endsection