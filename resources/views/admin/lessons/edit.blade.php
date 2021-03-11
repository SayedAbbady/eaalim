@extends('admin.layouts.main')

@section('title')
  Edit Lessons
@endsection

@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-6 mx-auto col-12">
        <div class="card ">
          <div class="card-header">
            <h5 class="card-title">Lessons</h5>
            <p class="card-category">Edit lesson </p>
          </div>
          <div class="card-body ">

            <form enctype="multipart/form-data" accept-charset="utf-8" method="POST" id="lessonEdit">
              

              <input type="hidden" name="_token"  value="{{ csrf_token() }}">
              <input type="hidden" name="id"  value="{{ $lesson[0]->l_id }}">
              <input type="hidden" name="gameOld"  value="{{ $lesson[0]->l_game }}">
              <input type="hidden" name="quizOld"  value="{{ $lesson[0]->l_quiz }}">
              <div class="form-row">
                
                <div class="form-group col-md-12">
                  <label for="">Lesson title</label>
                  <input type="text" class="form-control lesson-main" name="title" placeholder="Title" value="{{$lesson[0]->l_name}}">
                  <small class="text-danger errorClass font-weight-bold" id="titleErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">lesson Live Link</label>
                  <input type="text" class="form-control lesson-main" name="liveLink" placeholder="lesson Live Link" value="{{$lesson[0]->l_live}}">
                  <small class="text-danger errorClass font-weight-bold" id="liveLinkErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">lesson Sentence</label>
                  <input type="text" class="form-control lesson-main" name="Sentence" placeholder="lesson Sentence" value="{{$lesson[0]->l_sentens}}">
                  <small class="text-danger errorClass font-weight-bold" id="SentenceErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">lesson Video</label>
                  <textarea style='min-height:100px!important;' class="form-control lesson-main" name="lesson_video" placeholder="lesson Video"> {{$lesson[0]->l_video}}</textarea>
                  <small class="text-danger errorClass font-weight-bold" id="lesson_videoErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">lesson Notes</label>
                  <textarea id="summernote" style='min-height:100px!important;' class="form-control lesson-main" name="lesson_notes" placeholder="lesson Notes">{{$lesson[0]->l_notes}}</textarea>
                  <small class="text-danger errorClass font-weight-bold" id="lesson_notesErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">Level</label>
                  <select name="level" class="form-control" id="">
                    <option value="{{$lesson[0]->l_level}}"> Default</option>
                    @php
                      $nameunit = App\Models\units::select('u_id','u_name')->get();
                    foreach ($nameunit as $value){
                      echo "<optgroup label='$value->u_name'>";

                      $namesection = App\Models\sections::where('s_unit','=',$value->u_id)->select('s_id','s_name')->get();
                      foreach ($namesection as $sectionvalue){
                          echo "<optgroup label='-- $sectionvalue->s_name'>";
                          $namelevel = App\Models\levels::where('l_section','=',$sectionvalue->s_id)->select('l_id','l_name')->get();
                          foreach ($namelevel as $levelvalue) {
                              echo "<option value='$levelvalue->l_id'>$levelvalue->l_name</option>";
                          }
                          echo "</optgroup>";
                      }
                      echo "</optgroup>
                      <optgroup label='====================================='> </optgroup>";
                    }
                    @endphp

                  </select>
                  <small class="text-danger errorClass font-weight-bold" id="levelErrors"></small>
                </div>
                <div class="form-group col-md-12">
                  <label for="">lesson Rate</label>
                  <input type="text" class="form-control lesson-main" name="lesson_rate" placeholder="lesson Rate" value="0.001">
                  <small class="text-danger errorClass font-weight-bold" id="lesson_rateErrors"></small>
                </div>

                <div class="form-group col-md-12 input-File-Custom">
                  <label for="">Select Game</label>
                  <input type="file" name="game" class="input-file lesson-main">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Choose a game file</span>
                  </label>
                  <small class="text-danger errorClass font-weight-bold" id="fileErrors"></small>
                </div>
                <div class="form-group col-md-12 input-File-Custom">
                  <label for="">Select Quiz</label>
                  <input type="file" name="quiz" class="input-file lesson-main">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName ">Choose a quiz file</span>
                  </label>
                  <small class="text-danger errorClass font-weight-bold" id="fileErrors"></small>
                </div>


              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="card-footer ">
              <hr>
              <div class="stats">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection
