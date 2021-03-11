@extends('user.layout')

@section('title')
Eaalim syllabus
@endsection

@section('content')
@include('user.navbar')
<div class="container">
  <br>
<br>
<br>
<br>
<h1> ( <b><?php echo $search?></b> ) Results : <?php echo $result->count();?> </h1><br>
<?php 
  if($result->count() == 0){
      ?>
      <div class="alert alert-danger"> Results Are Zero </div>
      <?php
  }else{
      foreach ($result as $res) {
          ?>
      <div class="bord" style="border-bottom:1px solid #ccc;"> <?php 
      $str =  str_replace('|',' ',$res->l_name);
      $str =  str_replace('lesson',' ',$str);
      $str = preg_replace('/([0-9])/', '', $str);
      echo str_replace($search,'<span style="background:yellow;padding:0 10px;display:inline-block">'.$search.'</span>',$str);
      ?>  </div>
          <?php
      }
  }
?>

<br><br><br><br>
<br><br><br><br>
</div>

@endsection