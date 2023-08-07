<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $courses = Course::latest()->paginate(5);
         return view(('admin.courses.index'), compact('courses'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select(['id','name'])->get();
        return view('admin.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate input
         Validator::make($request->all(), [
            'name' => 'required|unique:courses,name',
            'price' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'category_id' => 'required',
        ], [
            'required' => 'هذا الحقل مطلوب'
        ])->validate();

        //upload image

        $ex = $request->file('image')->getClientOriginalExtension();
        $new_img_name = 'maysaa_courses_'.time() . '.' . $ex;
        $request->file('image')->move(public_path('uploads'), $new_img_name);

        //Add value
        Course::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'content' => $request->content,
            'image' => $new_img_name,
            'category_id' =>$request->category_id,
        ]);
        return redirect()->route('courses.index')
        ->with('success', 'Course Added Successfuly');

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course )
    {
        $categories = Category::select(['id', 'name'])->get();
        // $course = Course::findOrFail($course);
        return view('admin.courses.edit', compact('categories','course'));        
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
       
        //validate input
        Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'category_id' => 'required',
        ], [
            'required' => 'هذا الحقل مطلوب'
        ])->validate();
        $new_img_name = $course->image;
        if($request->has('image')) {

                 //upload image
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_img_name = 'maysaa_courses_'.time() . '.' . $ex;
            $request->file('image')->move(public_path('uploads'), $new_img_name);

        }

        
        //Add value
        $course->update([
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->content,
            'image' => $new_img_name,
            'category_id' =>$request->category_id,
        ]);
        return redirect()->route('courses.index')
        ->with('success', 'Course Updated Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
        ->with('success', 'Course Deleted Successfuly');
    }

    public function registrations()
    {
        $data = Registration::paginate(5);
        return view('admin.courses.registrations', compact('data'));
    }

    public function registrationsDelete($id)    
    {
        Registration::find($id)->delete();
        return redirect()->route('registrations')
        ->with('success', 'Registrations Deleted Successfuly');
    }
}
