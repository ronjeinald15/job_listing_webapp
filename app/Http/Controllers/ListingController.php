<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(){
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(6);
        return view('listings.index',['listings' => $listings]);
    }

    public function show(Listing $listing){
        return view('listings.show', ['listing' => $listing]);
    }

    public function create(Request $request){
        return view('listings.create');
    }

    public function store(Request $request){
        $formFields = $request->validate([  
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);

        return redirect('/listings')->with('success', 'Listing successfully created!');
    }

    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }


    public function update(Request $request, Listing $listing){
        $formFields = $request->validate([  
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        $listing->update($formFields);

        return back()->with('success', 'Listing updated successfully!');
    }

    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/listings')->with('success', 'Job successfully deleted!');
    }
}
