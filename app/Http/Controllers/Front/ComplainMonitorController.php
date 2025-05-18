<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Response;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use App\Models\ComplainMonitor;
use App\Models\FdOneForm;
use Illuminate\Support\Facades\App;
class ComplainMonitorController extends Controller
{
    public function index(){


        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $complainList = ComplainMonitor::where('user_id',Auth::user()->id)->latest()->get();

        return view('front.complainMonitor.index',compact('complainList','ngo_list_all'));
    }


        public function create(){

            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $complainList = ComplainMonitor::where('user_id',Auth::user()->id)->latest()->get();

            return view('front.complainMonitor.create',compact('complainList','ngo_list_all'));

        }


        public function edit($id){

            $complainId = base64_decode($id);

            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $complainList = ComplainMonitor::where('user_id',Auth::user()->id)->
                             where('id',$complainId)->first();


            return view('front.complainMonitor.edit',compact('complainList','ngo_list_all'));

       }


        public function show($id){

            $complainId = base64_decode($id);

            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $complainList = ComplainMonitor::where('user_id',Auth::user()->id)->
                             where('id',$complainId)->first();


            return view('front.complainMonitor.view',compact('complainList','ngo_list_all'));

       }

        public function store(Request $request){



            $request->validate([

                'subject' => 'required|string',
                'des' => 'required',

            ]);
            try{
                DB::beginTransaction();

                $complainMonitor = new ComplainMonitor();
                $complainMonitor->user_id =Auth::user()->id;
                $complainMonitor->subject =$request->subject;
                $complainMonitor->description =$request->des;
                $complainMonitor->status ='চলমান';
                $complainMonitor->save();

                DB::commit();
                return redirect()->route('complain.index')->with('success','Added Successfuly');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('error_404');
            }
        }



        public function update(Request $request,$id){
            try{
                DB::beginTransaction();

                $complainMonitor = ComplainMonitor::find($id);
                $complainMonitor->user_id =Auth::user()->id;
                $complainMonitor->subject =$request->subject;
                $complainMonitor->description =$request->des;
                $complainMonitor->save();

                DB::commit();
                return redirect()->route('complain.index')->with('success','Updated Successfuly');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('error_404');
            }
        }


        public function destroy($id){
            try{
                DB::beginTransaction();
                $admins = ComplainMonitor::find($id);
                if (!is_null($admins)) {
                    $admins->delete();
                }
                DB::commit();
                return back()->with('error','Deleted successfully!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('error_404');
            }
        }
}
