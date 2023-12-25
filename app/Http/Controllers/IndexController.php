<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transcript;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function claculate(Request $request)
    {
        $request->validate([
            'course' => 'required',
            'maxMarks' => 'required',
            'marksObtained' => 'required',
            'creditHours' => 'required',
            'gradePoints' => 'required|Numeric|Decimal'
        ]);

        $transcript = new Transcript;
        $transcript->course = $request['course'];
        $transcript->maxMarks = $request['maxMarks'];
        $transcript->marksObtained = $request['marksObtained'];
        $transcript->creditHours = $request['creditHours'];
        $transcript->gradePoints = $request['gradePoints'];
        $transcript->save();
        return redirect('transcript');
    }

    public function transcriptData(){
        if (Auth::check()) {
            $transcripts = Transcript::all();
            $data = compact('transcripts');
            return view('transcript')->with($data);
        }
        return redirect('login');
    }
    public function trash(){
        $transcripts = Transcript::onlyTrashed()->get();
        $data = compact('transcripts');
        return view('trashed')->with($data);
    }
    public function delete($id){
       $transcript = Transcript::find($id);
       if (!is_null($transcript)) {
            $transcript->delete();
       }
       return redirect('transcript');
    }
    public function edit($id){
        $transcript = Transcript::find($id);
        if (is_null($transcript)) {
            return redirect('transcript');
        }else{
            $url = url('transcript/update').'/'.$id;
            $data = compact('transcript','url');
            return view('transcript-update')->with($data);
        }
    }
    public function update($id, Request $request){
        $transcript = Transcript::find($id);
        $transcript->course = $request['course'];
        $transcript->maxMarks = $request['maxMarks'];
        $transcript->marksObtained = $request['marksObtained'];
        $transcript->creditHours = $request['creditHours'];
        $transcript->gradePoints = $request['gradePoints'];
        $transcript->save();
        return redirect('transcript');
    }
}

