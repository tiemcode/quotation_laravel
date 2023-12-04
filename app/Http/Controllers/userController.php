<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\quotes;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class userController extends Controller
{
    public function index()
    {
        $companies = Company::whereHas('users', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
        return view('user.index', compact('companies'));
    }
    public function show(Company $company)
    {
        $this->authorize('hasCompany', $company);
        return view('user.show', compact('company'));
    }
    public function employs(Company $company)
    {
        $this->authorize('hasCompany', $company);
        //all users that are linkt to a company
        $users = $company->users;
        return view('user.employs', compact('company', 'users'));
    }
    public function quotes(Company $company)
    {
        $this->authorize('hasCompany', $company);
        $quotes = quotes::where('company_id', $company->id)->get();
        return view('user.quotes', compact('company', 'quotes'));
    }
    public function accept(Company $company, quotes $quote, Request $request)
    {
        $this->authorize('hasCompany', $company);
        //find dit on the id where to update it
        $quote = quotes::find($request->quote_id);
        //update a quote in that database with the current date
        $quote->accepted_date = date('y-m-d');
        $quote->save();
        return redirect()->route('user.companyQuotes', $company->id)->with('success', 'Offerte geaccepteerd');
    }
    public function downloadPDF(Company $company, Request $request)
    {
        $this->authorize('hasCompany', $company);

        // Find the quote based on the ID
        $quote = quotes::find($request->quote_id);

        // Prepare data for the PDF
        $data = [
            'company' => $company,
            'quote' => $quote,
        ];

        $filename = 'quote-' . $quote->id . '.pdf';
        $dompdf = PDF::loadview(
            'user.pdf',
            $data,
            ['paper' => 'a4']
        );

        return $dompdf->download($filename);
    }
    //downloand the file from the database
    public function downloadFile(Company $company, Request $request)
    {
        $this->authorize('hasCompany', $company);
        $quote = quotes::find($request->quote_id);
        $file = $quote->file;
        return response()->download(public_path("/docs/$file"));
    }
}
