<?php

namespace App\Http\Controllers;

use App\Models\Image;
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
        $labels = Label::paginate(20);
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
            'label_name' => 'required'
        ]);

        $get_label_id = Label::where('name', '=', $request->input('label_name'))->first();
        if ($get_label_id) {
            return redirect()->route('labels.create')->with('error', 'Label ' . $request->input('name') . ' is already in the database.');
        }
        if (!$get_label_id) {
            //Persist the record in the database
            //form data is available in the request object
            $label = new Label();
            //input method is used to get the value of input with its
            //name specified
            $label->name = $request->input('label_name');
            $label->description = $request->input('description');
            $label->save(); //persist the data

            //save the image 
            if ($request->hasFile('file')) {
                $files = $request->file('file');
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $path = $file->store('images', 'public');

                    $save = new Image;
                    $save->reference = 'label';
                    $save->reference_id = $label->id;
                    $save->name = $name;
                    $save->path = $path;
                    $save->save();
                };
            }
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
        //Return view to detail label
        $label = Label::find($label->id);

        $records = Record::with(['label'])->where('label_id', '=', $label->id)->get();

        $images = Image::where('reference', '=', 'label')
            ->where('reference_id', '=', $label->id)
            ->get();
        //dd($records);
        return view('labels.details', ['label' => $label, 'records' => $records, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        //Find the label
        $label = Label::where('id', '=', $label->id)->first();

        $images = Image::where('reference', '=', 'label')
            ->where('reference_id', '=', $label->id)
            ->get();
        if (empty($label)) {
            return redirect()->route('labels.index')->with('error', 'Invalid label');
        } else {
            return view('labels.edit', ['label' => $label, 'images' => $images]);
        }
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
        $this->validate($request, [
            'label_name' => 'required'
        ]);

        $label->id = $request->id;
        $label->name = $request->label_name;
        $label->description = $request->description;

        $label->save();

        return redirect()->route('labels.index')->with('info', 'Label ' . $label->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        $label = Label::find($label->id);
        $result = Record::where('label_id', '=', $label->id)->first();
        if (!$result) {
            $images = Image::where('reference', '=', 'label')
                ->where('reference_id', '=', $label->id)
                ->get();

            foreach ($images as $image) {
                unlink(public_path() . '/storage/' . $image->path);
                $image->delete($image->name);
            }
            //delete
            $label->delete();
            return redirect()->route('labels.index')->with('info', 'Label ' . $label->name . ' deleted successfully');
        } else {
            return redirect()->route('labels.index')->with('error', 'Label ' . $label->name . ' could not be deleted. ');
        }
    }

    public function print(Label $label)
    {
        //Find the label        
        // $records = Record::where('label_id', '=' , $label->id)
        // ->orderBy('artists.name', 'asc')
        // ->get();

        $records = Record::where('label_id', '=', $label->id)
            ->join('artists', 'records.artist_id', '=', 'artists.id')
            ->orderBy('artists.name', 'ASC')
            ->orderBy('title', 'ASC')->get();

        $total_value = $records->sum('current_price');
        return view('labels.print', ['label' => $label, 'records' => $records, 'total_value' => $total_value]);
    }
}
