<?php


namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Course;
use App\Models\Registration;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('front.index', compact('courses'));
    }
    public function search(Request $request)
    {
        // dd($request->all());
        $courses = Course::where('name', 'like', '%' . $request->s .'%')
        ->orWhere('content', 'like', '%' . $request->s .'%')
        ->get();
        return view('front.index', compact('courses'));
    }

    public function course($slug)
    {
        $course = Course::where('slug', $slug)->first();
        return view('front.course', compact('course'));
    }

    public function register($slug)
    {
        $course = Course::where('slug', $slug)->first();
        return view('front.register', compact('course'));
    }

    public function registerSubmit(Request $request, $slug)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
        ]);
        $course = Course::where('slug', $slug)->select('id')->first();
        $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
            $user = User::Create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'gender' => $request->gender,
            ]);
        }
        
       $register = Registration::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);  
        return redirect()->route('pay', $register->id);
    }

    function pay($id)
    {
        $regster = Registration::find($id);

        return view('front.pay', compact('regster'));
    }
    function thanks($id)
    {
        Registration::find($id)->update([
            'status'=>1
        ]);

        return redirect()->route('homepage');
    }

    public function contact()
     {
         return view('front.contact');
     }

     public function contactSubmit(Request $request)
     {
         Mail::to('admin@admin.com')->send(new ContactMail($request->except('_token')));
         return redirect()->back();
     }


}
