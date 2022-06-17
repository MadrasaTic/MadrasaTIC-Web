<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $report = new Report();
        $report->title = $request->get('title');
        $report->description = $request->get('description');
        $report->created_by = $request->user()->id;
        $report->signalement_id = $request->get('signalement_id');
        if ($request->hasFile('attachement')) {
            $path = $request->file('attachement')->store('images/reports', 'public');
            $report->attachement = $path;
        } else {
            $report->attachement = "";
        }
        $report->save();

        return $report;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return $report;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return $report;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->title = $request->get('title');
        $report->description = $request->get('description');
        $report->created_by = $request->user()->id;
        $report->signalement_id = $request->get('signalement_id');
        if ($request->hasFile('attachement')) {
            $path = $request->file('attachement')->store('images/reports', 'public');
            $report->attachement = $path;
        }
        $report->save();
        return $report;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return "report delleted";
    }
}
