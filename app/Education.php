<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Education extends Model
{
    protected $table ='education';

    protected $fillable = [
        'student_id', 'university', 'college', 'branch', 'semester',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

     public function getAllEducationList()
    {
        return Education::with('student')->where('is_deleted',0)->get();
    }
    

    public function saveEducation(Request $request)
    {

        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('student_id', 'university', 'college', 'branch', 'semester');
        $saveResult = Education::create($data);
        if ($saveResult) {
            DB::commit();
        }else{
            DB::rollback();
        }
        return $saveResult;
    }

    public function editEducation(Education $education, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('name', 'university', 'college', 'branch', 'semester');
        $saveResult = $education->fill($data)->save();
        if ($saveResult) {
            DB::commit();
        }else{
            DB::rollback();
        }
        return $saveResult;
    }
}
