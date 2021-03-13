<?php

namespace App\Http\Controllers\admin;

use App\Models\lessons;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Storage;

class LessonController extends Controller 
{
    use FileTrait;
    public function index ()
    {
      return view('admin.lessons.index',[
        'lessons' => lessons::all()
      ]);
    }

    public function create ()
    {
      return view('admin.lessons.create');
    }

    public function store(Request $request)
    {
      
      $request->validate([
        'title'        =>'required',
        'lesson_video'         =>'required',
        'lesson_notes'         =>'required',
        'level'         =>'required',
        
      ]);

      if ($request->has('game')){
        $game_file =  $this->saveFile($request->game,'upload/');
      } else {$game_file = NULL;}
      if ($request->has('quiz')){
        $quiz_file =  $this->saveFile($request->quiz,'upload/');
      } else {$quiz_file = NULL;}
      if ($request->has('new_file')){
        $new_file =  $this->saveFile($request->new_file,'upload/');
      } else {$new_file = NULL;}
  
       $new_num = lessons::select('l_num')->orderby('l_num','DESC')->first()->l_num + 1;
  
      $slider = lessons::create([
        "l_name"            =>$request->title,
        "l_video"       =>$request->lesson_video,
        "l_notes" => $request->lesson_notes,
        "l_quiz" => $quiz_file,
        "l_game" => $game_file,
        "l_file" => $new_file,
        "l_level" => $request->level,
        "l_num" => ($new_num=='0')?"1":$new_num 
  
      ]);
  
      if ($slider)
        return redirect()->route('lesson.create')->with('msg', "successfully");
        
      else
        return redirect()->route('lesson.create')->with('error', "Error");
        
    }

    public function edit($id)
    {
      return view('admin.lessons.edit',[
        'lesson'=>lessons::where('l_id',$id)->get()
      ]);
    }

  public function updateLesson(Request $request)
  {
    
    $request->validate([
      'title'        =>'required',
      'lesson_video'         =>'required',
      'lesson_notes'         =>'required',
      'level'         =>'required',
      'lesson_rate'         =>'required',
      'id'         =>'required'
    ]);

    if ($request->has('game')){
      $game_file =  $this->saveFile($request->game,'upload/');
    } else {$game_file = $request->gameOld;}
    if ($request->has('quiz')){
      $quiz_file =  $this->saveFile($request->quiz,'upload/');
    } else {$quiz_file = $request->quizOld;}

    $slider = lessons::where('l_id',$request->id)
      ->update([
        "l_name"            =>$request->title,
        "l_words"       =>"0",
        "l_video"       =>$request->lesson_video,
        "l_notes" => $request->lesson_notes,
        "l_sentens" => $request->Sentence??"0",
        "l_rec" => "0",
        "l_quiz" => $quiz_file,
        "l_game" => $game_file,
        "l_rate" => $request->lesson_rate,
        "l_level" => $request->level,
        "l_live" => $request->liveLink,
      ]);

    if ($slider)
      return response()->json([
        "status"    => '1',
        "msg"       => 'Edit successfully'
      ]);
    else
      return response()->json([
        "status"    => '0',
        "msg"       => 'Nothing changed to save'
      ]);
      
  }

    public function deleteLesson(Request $request)
    {
      try {
        $folder = lessons::where('l_id',$request->id)->select('l_quiz','l_game')->get();
        if (File::deleteDirectory($folder[0]->l_quiz)){
          File::deleteDirectory($folder[0]->l_game);
        }

        $sliderDelete = lessons::where('l_id',$request->id)->delete();
      
        if ($sliderDelete)

            return response()->json([
                "status"    => '1',
                "msg"       => 'Lesson, deleted successfully'
            ]);
        else
            return response()->json([
                "status"    => '0',
                "msg"       => 'Sorry, please try again'
            ]);
      } catch (\Throwable $th) {
        throw $th;
      }
      
    }
    
}
