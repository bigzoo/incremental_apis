<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Transformers\LessonTransformer;

class LessonsController extends ApiController{

    /**
     * @var [App\Controllers\LessonTransformer]
     */
    protected $lessonTransformer;

    /**
     * [__construct [Class contructor]]
     * @param LessonTransformer $lessonTransformer []
     */
    function __construct(LessonTransformer $lessonTransformer){

      $this->lessonTransformer = $lessonTransformer;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
      $lessons = Lesson::all();
      return $this->respond([
        'data'=> $this->lessonTransformer->transformCollection($lessons->all())
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $lesson = Lesson::find($id);

        if (! $lesson) {
          return $this->respondNotFound('Lesson not found!');
        }

        return $this->respond([
          'data' => $this->lessonTransformer->transform($lesson)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
