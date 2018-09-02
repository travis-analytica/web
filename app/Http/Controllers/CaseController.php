<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Cases;
use App\Party;
use \App\CaseNote;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cases'] = Cases::where('valid', 1)->get();

        return view('cases.index', $data);
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
        $case = Cases::find($id);
        $parties = Party::where('case_number', $case->case_number)->get();
        $notes = CaseNote::where('case_id', $id)->get();

        return view( 'cases.show', compact('case', 'parties', 'notes') );
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

    /**
     * Store an updated completion status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStatus(Request $request, $id)
    {
        $case = Cases::find($id);
        $case->completion_status = $request->get('completion_status');
        $case->completion_status_updated_at = DB::raw('now()');
        $case->save();

        return redirect( route('case.show', $id) );
    }

    /**
     * Store a newly created case note in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNote(Request $request, $id)
    {
        $note = new CaseNote();
        $note->user_id = Auth::user()->id;
        $note->case_id = $id;
        $note->note = $request->get('note');
        $note->save();

        return redirect( route('case.show', $id) );
    }
}
