<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Record;
use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all artists from the database and return to view
        $labels = Label::paginate(10);
        return view('labels.index', ['labels' => $labels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLabelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabelRequest $request)
    {
        //check the input
        $this->validate($request, [
            'name' => 'required'
        ]);

        $get_label_id = Label::where('name', '=', $request->input('name'))->first();
        if ($get_label_id) {
            return redirect()->route('labels.create')->with('error', 'Label ' . $request->input('name') . ' is already in the database.');
        }
        if (!$get_label_id) {
            //Persist the record in the database
            //form data is available in the request object
            $label = new Label();
            //input method is used to get the value of input with its
            //name specified
            $label->name = $request->input('name');
            $label->description = $request->input('description');
            $label->save(); //persist the data
            return redirect()->route('labels.create')->with('info', 'Label ' . $request->input('name') . ' added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //Return view to detail artist
        $label = Label::find($label->id);

        $records = Record::with(['label'])->where('label_id', '=', $label->id)->get();
        //dd($records);
        return view('labels.details', ['label' => $label, 'records' => $records]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLabelRequest  $request
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLabelRequest $request, Label $label)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        //
    }
}
