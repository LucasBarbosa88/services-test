<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'People';

        $people = Person::paginate(10);

        return view('people.index', compact('title' ,'people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'full_name' => 'required',
            'cpf' => 'required|unique:people',
            'gender' => 'required',
            'phone' => 'required',
            'cep' => 'required',
            'street' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'description' => 'required',
            'image' => 'required',
            'nickname' => 'required',
        ]; 

        if($request->validate($rules)){
            if($request->hasFile('image')){
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
                $request->image = $fileNameToStore ;
            }
            $person = Person::createPerson(
                $request->full_name,
                $request->cpf,
                $request->nickname,
                $request->gender,
                $request->phone,
                $request->cep,
                $request->street,
                $request->neighborhood,
                $request->city,
                $request->description,
                $request->image
            );

            if($person){
                return redirect()->back()->with('success' ,'Person created with success!');
            } else {
                return redirect()->back()->with('danger', 'Not possible create this Person! Try again.');
            }
        }
        return redirect()->back()->with('danger', 'Not possible create this Person! Try again.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);

        return view('people.show', compact('title' ,'person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $rules = [
            'full_name' => 'required',
            'cpf' => 'required|cpf|unique:people',
            'nickname' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'cep' => 'required',
            'street' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'description' => 'required',
            'image' => 'required|file',
        ]; 

        if($request->validate($rules)){
            if($request->hasFile('image')){
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
                $request->image = $fileNameToStore ;
            }
            $person = Person::updatePerson(
                $request->id,
                $request->full_name,
                $request->cpf,
                $request->nickname,
                $request->gender,
                $request->phone,
                $request->cep,
                $request->street,
                $request->neighborhood,
                $request->city,
                $request->description,
                $request->image
            );

            if($person) {
                return redirect()->back()->with('success', 'Person update with success!');
            } else {
                return redirect()->back()->with('danger', 'Not possible update this Person! Try again.!');
            }
        }

        return redirect()->back()->with('danger', 'Not possible update this Person! Try again.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        if($person) {
            $person->delete();

            return redirect()->back()->with('success', 'Person deleted with success!');
        }
    }
}
