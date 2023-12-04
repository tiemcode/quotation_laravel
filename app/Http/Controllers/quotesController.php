<?php

namespace App\Http\Controllers;

use App\Http\Requests\quotesValidation;
use App\Models\Company;
use App\Models\quotes;
use Illuminate\Http\Request;

class quotesController extends Controller
{
    // index
    public function index()
    {
        $this->authorize('isAdmin',  User::class);
        $quotes = quotes::paginate(6);
        return view('admin.quotes.index', compact('quotes'));
    }
    //create
    public function create()
    {
        $this->authorize('isAdmin',  User::class);
        $companies = Company::all();
        return view('admin.quotes.create', compact("companies"));
    }
    //store
    public function store(quotesValidation $request)
    {
        $this->authorize('isAdmin',  User::class);
        $quotes = new quotes();
        $quotes->company_id = $request->company;
        $quotes->quotes_number = $request->number;
        $quotes->description = $request->desc;
        if ($request->file) {
            $fileName = time() . uniqid() . '.' . $request->file->extension();
            $request->file->move(public_path('docs'), $fileName);
            $quotes->file = $fileName;
        }
        $quotes->save();
        return redirect()->route('quotes.index')->with('success', 'Offerte is succesvol aangemaakt');
    }
    //search
    public function search(Request $request)
    {
        $this->authorize('isAdmin',  User::class);
        $bar = $request->search;
        $quotes = quotes::where('quotes_number', 'LIKE', "%{$bar}%")
            //where for company
            ->orWhereHas('company', function ($query) use ($bar) {
                $query->where('company_name', 'LIKE', "%{$bar}%");
            })
            ->orWhere('accepted_date', 'LIKE', "%{$bar}%")
            ->orderBy('created_at', 'desc')

            ->paginate(6);
        return view('admin.quotes.index', compact('quotes', 'bar'));
    }

    //edit
    public function edit(quotes $quote)
    {
        $this->authorize('isAdmin',  User::class);
        $companies = Company::all();
        $dropDownComp = Company::where('id', $quote->company_id)->first();
        $selectedId =  $dropDownComp->id;
        return view('admin.quotes.edit', compact('quote', 'companies', 'selectedId'));
    }
    //update
    public function update(quotesValidation $request, quotes $quote)
    {
        $this->authorize('isAdmin',  User::class);
        $quote->company_id = $request->company;
        $quote->quotes_number = $request->number;
        $quote->description = $request->desc;
        $quote->accepted_date = $request->date;
        if ($request->file) {
            $fileName = time() . uniqid() . '.' . $request->file->extension();
            $request->file->move(public_path('docs'), $fileName);
            $quote->file = $fileName;
        }
        $quote->save();
        return redirect()->route('quotes.index')->with('success', 'Offerte is succesvol aangepast');
    }

    //destroy
    public function destroy(quotes $quote)
    {
        $this->authorize('isAdmin',  User::class);
        $quote->delete();
        return redirect()->route('quotes.index')->with('success', 'Offerte is succesvol verwijderd');
    }
    //showquote
    public function showQuote(quotes $quote)
    {
        $this->authorize('isAdmin',  User::class);
        return view('admin.quote.show', compact('quote'));
    }
}
