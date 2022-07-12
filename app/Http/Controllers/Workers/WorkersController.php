<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use App\Models\Workers;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    public function index()
    {

        $paginator = Workers::paginate(100);
        return view('home', compact( 'paginator'));
    }
    public function filter(Request $request)
    {
        if (!empty($request->input('seriia')) && !empty($request->input('number'))) {
            $number = $request->input('number');
            $series = $request->input('seriia');
              $workers = Workers::select('*')->where('number', '=', $series )->where( 'series', '=', $number)->get();
        } elseif (!empty($request->input('name')) && !empty($request->input('date'))) {
            $workers = Workers::select('*')->where('first_name', '=', $request->input('name') )->where( 'birthday', '>', $request->input('date'))->get();
            dd($workers);
        } elseif (!empty($request->input('company'))) {
            $workers = Workers::select('id')->where('company', '=', $request->input('company'))->get();
            $count = count($workers);
            dd($count);
        } elseif (!empty($request->input('role')) && !empty($request->input('date')) && !empty($request->input('date_end'))) {
            $workers = Workers::orderBy('first_name', 'desc')->where('role', '=', $request->input('role'))->where('birthday', '>', $request->input('date'))
                ->where('birthday', '<', $request->input('date_end'))->get();
            dd($workers);
        } else {
            $workers = Workers::orderBy('first_name', 'desc')
                ->where(function($query) {
                $query->where('role', '=', 'Химик-технолог')
                ->orWhere('role', '=', 'Химик')
                ->orWhere('role', '=', 'Биохимик');})
                ->where('company', '=', 'X5 Retail Group')->get();
            echo '<pre>';
            print_r($workers);
        }

    }
}
