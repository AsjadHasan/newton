<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Faq;
use App\Http\Requests\FaqFormPost;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        // $users = User::all(); //All the records that store in users table

        // $users =User::orderBy('id','desc')->get();

        $logged_in_user = Auth::id();

    $users = User::where('id','!=',$logged_in_user)->orderBy('name','asc')->get();//asc or desc order a dekhte caile ei query chalate hobe

    $users = User::orderBy('name','asc')->paginate(2);//numbering system

    //$users = User::orderBy('name','asc')->simplePaginate(3);//privious-next

        $total_users = User::count();
        return view('home', compact('users'));
    }
//index function end

  public function addfaq(){
    $faqs = Faq::all();
    return view('admin.addfaq', compact('faqs'));
  }
//addfaq function end

public function addfaqpost(FaqFormPost $request){
  Faq::insert([
    'faq_qsn' => $request->faq_qsn,
    'faq_ans' => $request->faq_ans,
  ]);
  return back()->withStatus('Hoia geche');
}
//addfaqpost function end

public function faqdelete($faq_id)
{
  Faq::find($faq_id)->delete();
  return back()->with('Deletestatus','Delete Hoia Geche');
}
//faqdelete end

public function faqedit($faq_id)
{
  $faq = Faq::find($faq_id);
  return view('admin.editfaq',compact('faq'));
}

public function editfaqpost(Request $request)
{
  Faq::find($request->faq_id)->update([
    'faq_qsn' => $request->faq_qsn,
    'faq_ans' => $request->faq_ans,
  ]);
  return redirect('add/faq');
}







}
