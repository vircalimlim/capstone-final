<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Medicine;
use App\Models\Blood;
use App\Models\Checkup;
use App\Models\Vaccine;
use App\Models\Prenatal;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    public function index()
    {
        return view('Report.index');
    }

    public function patient(Request $request)
    {
        if($request->tf == 1){
            //daily
            return Profile::whereDate('created_at', today())->get();
        }
        else if($request->tf == 2){
            //weekly
            return Profile::whereDate('created_at', Carbon::yesterday())->get();
        }
        else if($request->tf == 3){
            //this week
            return Profile::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        }
        else if($request->tf == 4){
            //this month
            return Profile::whereMonth(
                'created_at',
                Carbon::now()->format('m'))
                ->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
        }
        else if($request->tf == 5){
            //this year
            return Profile::whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
        }
        else if($request->tf == 6){
            //last 30 days
            return Profile::whereDate('created_at', '>', now()->subDays(30))->get();
        }
        else if($request->tf == 7){
            //last 365 days
            return Profile::whereDate('created_at', '>', now()->subDays(365))->get();
        }
        else if($request->tf == 8){
            return Profile::latest()->get();
        }
        else{
            return false;
        }
    }

    public function medicine(Request $request)
    {
        if($request->tf == 1){
            //daily
            return Medicine::whereDate('created_at', today())->get();
        }
        else if($request->tf == 2){
            //yesterday
            return Medicine::whereDate('created_at', Carbon::yesterday())->get();
        }
        else if($request->tf == 3){
            //this week
            return Medicine::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        }
        else if($request->tf == 4){
            //this month
            return Medicine::whereMonth(
                'created_at',
                Carbon::now()->format('m'))
                ->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
        }
        else if($request->tf == 5){
            //this year
            return Medicine::whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
        }
        else if($request->tf == 6){
            //last 30 days
            return Medicine::whereDate('created_at', '>', now()->subDays(30))->get();
        }
        else if($request->tf == 7){
            //last 365 days
            return Medicine::whereDate('created_at', '>', now()->subDays(365))->get();
        }
        else if($request->tf == 8){
            return Medicine::latest()->get();
        }
        else{
            return false;
        }
    }

    public function releasemed(Request $request)
    {
        if($request->tf == 1){
            //daily
            $releasemeds = Medicine::with('profile')->whereDate('created_at', today())->get();
            return response()->json(['releasemed' => $releasemeds]);
        }
        else if($request->tf == 2){
            //yesterday
            $releasemeds = Medicine::with('profile')->whereDate('created_at', Carbon::yesterday())->get();
            return response()->json(['releasemed' => $releasemeds]);
        }
        else if($request->tf == 3){
            //this week
            $releasemeds = Medicine::with('profile')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            return response()->json(['releasemed' => $releasemeds]);
        }
        else if($request->tf == 4){
            //this month
            $releasemeds = Medicine::with('profile')->whereMonth(
                'created_at',
                Carbon::now()->format('m'))
                ->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['releasemed' => $releasemeds]);
        }
        else if($request->tf == 5){
            //this year
            $releasemeds = Medicine::with('profile')->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['releasemed' => $releasemeds]);
        }
        else if($request->tf == 6){
            //last 30 days
            $releasemeds = Medicine::with('profile')->whereDate('created_at', '>', now()->subDays(30))->get();
            return response()->json(['releasemed' => $releasemeds]);
        }
        else if($request->tf == 7){
            //last 365 days
            $releasemeds = Medicine::with('profile')->whereDate('created_at', '>', now()->subDays(365))->get();
            return response()->json(['releasemed' => $releasemeds]);
        }
        else if($request->tf == 8){
            $releasemeds = Medicine::with('profile')->latest()->get();
            return response()->json(['releasemed' => $releasemeds]);
        }
        else{
            return false;
        }
    }

    public function bp(Request $request)
    {
        if($request->tf == 1){
            //daily
            $bloods = Blood::with('profile')->whereDate('created_at', today())->get();
            return response()->json(['blood' => $bloods]);
            //return Blood::whereDate('created_at', today())->get();
        }
        else if($request->tf == 2){
            //yesterday
            $bloods = Blood::with('profile')->whereDate('created_at', Carbon::yesterday())->get();
            return response()->json(['blood' => $bloods]);
            //return Blood::whereDate('created_at', '>', now()->subDays(7))->get();
        }
        else if($request->tf == 3){
            //this week
            $bloods = Blood::with('profile')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            return response()->json(['blood' => $bloods]);
        }
        else if($request->tf == 4){
            //this month
            $bloods = Blood::with('profile')->whereMonth(
                'created_at',
                Carbon::now()->format('m'))
                ->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['blood' => $bloods]);
        }
        else if($request->tf == 5){
            //this year
            $bloods = Blood::with('profile')->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['blood' => $bloods]);
        }
        else if($request->tf == 6){
            //last 30 days
            $bloods = Blood::with('profile')->whereDate('created_at', '>', now()->subDays(30))->get();
            return response()->json(['blood' => $bloods]);
        }
        else if($request->tf == 7){
            //last 365 days
            $bloods = Blood::with('profile')->whereDate('created_at', '>', now()->subDays(365))->get();
            return response()->json(['blood' => $bloods]);
        }
        else if($request->tf == 8){
            $bloods = Blood::with('profile')->latest()->get();
            return response()->json(['blood' => $bloods]);
        }
        else{
            return false;
        }
    }

    public function checkup(Request $request){

        if($request->tf == 1){
            //daily
            $checkups = Checkup::with('profile')->whereDate('created_at', today())->get();
            return response()->json(['checkup' => $checkups]);
            //return Blood::whereDate('created_at', today())->get();
        }
        else if($request->tf == 2){
            //yesterday
            $checkups = Checkup::with('profile')->whereDate('created_at', Carbon::yesterday())->get();
            return response()->json(['checkup' => $checkups]);
            //return Blood::whereDate('created_at', '>', now()->subDays(7))->get();
        }
        else if($request->tf == 3){
            //this week
            $checkups = Checkup::with('profile')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            return response()->json(['checkup' => $checkups]);
        }
        else if($request->tf == 4){
            //this month
            $checkups = Checkup::with('profile')->whereMonth(
                'created_at',
                Carbon::now()->format('m'))
                ->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['checkup' => $checkups]);
        }
        else if($request->tf == 5){
            //this year
            $checkups = Checkup::with('profile')->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['checkup' => $checkups]);
        }
        else if($request->tf == 6){
            //last 30 days
            $checkups = Checkup::with('profile')->whereDate('created_at', '>', now()->subDays(30))->get();
            return response()->json(['checkup' => $checkups]);
        }
        else if($request->tf == 7){
            //last 365 days
            $checkups = Checkup::with('profile')->whereDate('created_at', '>', now()->subDays(365))->get();
            return response()->json(['checkup' => $checkups]);
        }
        else if($request->tf == 8){
            $checkups = Checkup::with('profile')->latest()->get();
            return response()->json(['checkup' => $checkups]);
        }
        else{
            return false;
        }

    }

    public function immunization(Request $request){

        if($request->tf == 1){
            //daily
            $immunizations = Vaccine::with('profile')->whereDate('created_at', today())->get();
            //Vaccine::with('profile')->get();
            //Vaccine::with('profile')->whereDate('created_at', today())->get();
            return response()->json(['immunization' => $immunizations]);
            //return Blood::whereDate('created_at', today())->get();
        }
        else if($request->tf == 2){
            //yesterday
            $immunizations = Vaccine::with('profile')->whereDate('created_at', Carbon::yesterday())->get();
            return response()->json(['immunization' => $immunizations]);
            //return Blood::whereDate('created_at', '>', now()->subDays(7))->get();
        }
        else if($request->tf == 3){
            //this week
            $immunizations = Vaccine::with('profile')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            return response()->json(['immunization' => $immunizations]);
        }
        else if($request->tf == 4){
            //this month
            $immunizations = Vaccine::with('profile')->whereMonth(
                'created_at',
                Carbon::now()->format('m'))
                ->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['immunization' => $immunizations]);
        }
        else if($request->tf == 5){
            //this year
            $immunizations = Vaccine::with('profile')->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['immunization' => $immunizations]);
        }
        else if($request->tf == 6){
            //last 30 days
            $immunizations = Vaccine::with('profile')->whereDate('created_at', '>', now()->subDays(30))->get();
            return response()->json(['immunization' => $immunizations]);
        }
        else if($request->tf == 7){
            //last 365 days
            $immunizations = Vaccine::with('profile')->whereDate('created_at', '>', now()->subDays(365))->get();
            return response()->json(['immunization' => $immunizations]);
        }
        else if($request->tf == 8){
            $immunizations = Vaccine::with('profile')->latest()->get();
            return response()->json(['immunization' => $immunizations]);
        }
        else{
            return false;
        }

    }

    public function prenatal(Request $request){

        if($request->tf == 1){
            //daily
            $prenatals = Prenatal::with('profile')->whereDate('created_at', today())->get();
            //Vaccine::with('profile')->get();
            //Vaccine::with('profile')->whereDate('created_at', today())->get();
            return response()->json(['prenatal' => $prenatals]);
            //return Blood::whereDate('created_at', today())->get();
        }
        else if($request->tf == 2){
            //yesterday
            $prenatals = Prenatal::with('profile')->whereDate('created_at', Carbon::yesterday())->get();
            return response()->json(['prenatal' => $prenatals]);
            //return Blood::whereDate('created_at', '>', now()->subDays(7))->get();
        }
        else if($request->tf == 3){
            //this week
            $prenatals = Prenatal::with('profile')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            return response()->json(['prenatal' => $prenatals]);
        }
        else if($request->tf == 4){
            //this month
            $prenatals = Prenatal::with('profile')->whereMonth(
                'created_at',
                Carbon::now()->format('m'))
                ->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['prenatal' => $prenatals]);
        }
        else if($request->tf == 5){
            //this year
            $prenatals = Prenatal::with('profile')->whereYear('created_at', Carbon::now()
                ->format('Y'))->get();
            return response()->json(['prenatal' => $prenatals]);
        }
        else if($request->tf == 6){
            //last 30 days
            $prenatals = Prenatal::with('profile')->whereDate('created_at', '>', now()->subDays(30))->get();
            return response()->json(['prenatal' => $prenatals]);
        }
        else if($request->tf == 7){
            //last 365 days
            $prenatals = Prenatal::with('profile')->whereDate('created_at', '>', now()->subDays(365))->get();
            return response()->json(['prenatal' => $prenatals]);
        }
        else if($request->tf == 8){
            $prenatals = Prenatal::with('profile')->latest()->get();
            return response()->json(['prenatal' => $prenatals]);
        }
        else{
            return false;
        }

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
