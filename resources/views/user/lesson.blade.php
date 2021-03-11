@extends('user.layout')

@section('title')
Eaalim syllabus
@endsection

@section('content')
  @include('user.navbar')

  <div class="side-menu">
    @foreach ($lessons as $lesson) 
        
        <a href="{{route('lesson_show',['id'=>$lesson->l_id,'level'=>$lesson->l_level])}}" class="un-locked "> <i class="fa fa-unlock"></i> <?php echo $lesson->l_name?> </a>
    @endforeach
</div>
<div class="lock"> <i class="fa fa-chevron-right"></i> </div>

<div class="container">
    <br>
    <br>
    <br>
    <div class="bord">
        <h4> <?php echo $lessono->l_name?>  
            <?php 
            
            if($lessono->l_live != ''){
                ?>
                    <div class="pull-right">
                        <a href="<?php echo $lessono->l_live?>" target="_blank" class="btn btn-primary"><i class="fa fa-television"></i> Go A live </a> 
                    </div>
                <?php
            }

            ?>
        </h4>
        <hr>
        <?php echo $lessono->l_video?>
        <br>
        <br>
        <div>
            <span class="h5"> Listen :  </span> 
            <?php
            $words = explode(',',$lessono->l_sentens);
            if(count($words) > 0){
                $x = 0;
                foreach ($words as $word) {
                    $x++;
                    ?>
                    <a target="_blank" href="https://dictionary.cambridge.org/dictionary/english-arabic/<?php echo $word?>"> <?php echo $word?> </a> 
                    
                    <?php
                    if($x != count($words)){
                        ?>
                        ,
                        <?php 
                    }
                }
            }
            ?>
     
        </div>
        <br>
        <h5> Lesson Notes : </h5>
        <hr>
        <?php echo $lessono->l_notes?>
        <hr>
        
        
        <br>
        <div class="row">
            <div class="col-md-4">Lesson Rate : <b><?php echo $lessono->l_rate?>%</b></div>
            <div class="col-md-4 text-center"> <?php if($lessono->l_game != ''){
                ?>
                    <a href="{{asset('/'.$lessono->l_game)}}" target="_blank" class="btn btn-info"> Lesson Game </a>
                    <?php
            }?>
            <?php if($lessono->l_quiz != ''){
                ?>
                    <a href="{{asset('/'.$lessono->l_quiz)}}" target="_blank" class="btn btn-danger"> Lesson Quiz </a>
                    <?php
            }?> 
            <br>
            </div>
            {{-- <div class="col-md-4 text-md-right text-center"><a class="btn btn-success text-light" href="<?php echo base_url('user/finish/'.$lessono->l_id);?>"> Finish </a></div> --}}
        </div>
        
    </div>
    <br>
    <br>
</div>



@endsection
