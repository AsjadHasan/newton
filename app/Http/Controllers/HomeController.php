<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use App\Faq;
use App\Http\Requests\FaqFormPost;
use App\Mail\PasswordChangeConfirmationMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ChangePasswordFormPost;
use Carbon\Carbon;

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
        $this->middleware('verified');
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
    $soft_delete_faqs = Faq::onlyTrashed()->get();//for soft delete
    $faqs = Faq::all();
    return view('admin.addfaq', compact('soft_delete_faqs', 'faqs'));
  }
//add faq read function end

public function addfaqpost(FaqFormPost $request){
  Faq::insert([
    'faq_qsn' => $request->faq_qsn,
    'faq_ans' => $request->faq_ans,
    'created_at' => Carbon::now(),
  ]);
  return back()->withStatus('New Record Added');
}
//add faqpost create function end

public function faqsoftDelete($faq_id)
{
  Faq::find($faq_id)->delete();
  return back()->with('Deletestatus','Record Deleted');
}
//faq soft delete end

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
//faq edit end


public function faqundo($faq_id)
{

  Faq::withTrashed()->where('id',$faq_id)->restore();
  return back()->with('Deletestatus','Successfully Restored');
}
//faq soft delete undo end

public function faqhardDelete($faq_id)
{

  Faq::withTrashed()->where('id',$faq_id)->forceDelete();
  return back()->with('Deletestatus','Permanently Deleted');
}
// faq hard delete

// change password start

public function editprofile()
{
  return view('admin.ChangePass');
}

public function changepass(ChangePasswordFormPost $request)

{
  if ($request->old_password == $request->password) {
    return back()->withErrors('Your New Password Can not be your Old Password');
  }
  else {
    $old_password = $request->old_password;
    $db_password = Auth::user()->password;
    if (Hash::check($old_password,$db_password)) {
      User::find(Auth::id())->update([
        'password' => Hash::make($request->password),
      ]);
      // PasswordChangeConfirmationMail start
       Mail::to(Auth::user()->email)->send(new PasswordChangeConfirmationMail());
       // PasswordChangeConfirmationMail end
      return back()->with('password_changed_success','Your Password Changed');
    }
    else {
      return back()->with('password_changed_not_success','Your Old Password does not match');
    }
  }
}

// change password end





}
