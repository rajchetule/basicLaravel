<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\services\PayUservice\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Student;
use App\Education;
use Illuminate\Support\Facades\DB;
use Session;


class EducationController extends Controller
{
    public function __construct(Student $student, Education $education)
    {
        $this->exception = 'home';
        $this->student = $student;
        $this->education = $education;
    }
    public function index(){
        try{
             $educations = $this->education->getAllEducationList();

            return view('dashboard.education.index', compact('educations'));

        }catch(\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }

     public function add(Request $request){
        try{

            if ($request->isMethod('post')) {

                $validator = $this->getValidateEducation($request->all());

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                if ($this->education->saveEducation($request)) {
                    Session::flash('msg', 'Education data successfully save ');
                    Session::flash('alert-class', 'success');
                    return redirect()->route('education-list');
                }else{
                    Session::flash('msg', 'Unable to add education  data');
                    Session::flash('alert-class', 'danger');
                }
            }
            $students = $this->student->getAllStudentList();
            return view('dashboard.education.add', compact('students'));
        }catch(\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $education = Education::findOrFail($id);
            if ($request->isMethod('post')) {
                if ($this->education->editEducation($education, $request)) {
                    return redirect()->route('education-list');
                }
            }
            return view('dashboard.education.edit', compact('education'));
        } catch (\Exception $e) {
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }

    public function educationDelete($sid)
    {
        try {
            ducation::where('id', $sid)->update(['is_deleted' => 1]);
            return redirect()->route('education-list');
        } catch (\Exception $e) {
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }

    protected function getValidateEducation($data){
        $rule =[
            'student_id' => 'required',
            'university' => 'required',
            'college' => 'required',
            'branch' => 'required',
            'semester' => 'required',
        ];
        $errmsg = [
            'student_id.required' => 'Please select name',
            'university.required' => 'Please enter university',
            'college.required' => 'Please enter college',
            'branch.required' => 'Please enter branch',
            'semester.required' => 'Please enter semester',
        ];
        return Validator::make($data, $rule, $errmsg);
    }
}
