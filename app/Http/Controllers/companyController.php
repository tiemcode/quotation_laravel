<?php

namespace App\Http\Controllers;

use App\Http\Requests\companyAddValidation;
use App\Http\Requests\companyEditValidation;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\quotes;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class companyController extends Controller
{
    public function index()
    {
        $this->authorize('isAdmin',  User::class);
        $company = Company::paginate(6);
        return view('admin.company.index', compact('company'));
    }
    //search
    public function search(Request $request)
    {
        $this->authorize('isAdmin',  User::class);
        $bar = $request->search;
        $searchTerm = "%" . $bar . "%";
        if ($searchTerm) {
            $company = Company::where('company_name', 'LIKE', $searchTerm);
        } else {
            $company = Company::query();
        }
        $company = $company->orderBy('created_at', 'desc')
            ->paginate(6)
            ->appends(request()->query());
        return view('admin.company.index', compact('company', 'bar'));
    }

    public function create()
    {
        $this->authorize('isAdmin',  User::class);
        return view('admin.company.create');
    }
    public function store(companyAddValidation $request)
    {
        $this->authorize('isAdmin',  User::class);
        $company = new Company();
        $company->company_name = $request->company_name;
        $company->contact_person = $request->contact_person;
        $company->address = $request->address;
        $company->postal_code = $request->postal_code;
        $company->city = $request->city;
        $company->phone = $request->phone_number;
        $company->email = $request->email;
        if ($request->logo) {
            $imageName = time() . uniqid() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $imageName);
            $company->logo = $imageName;
        }
        $company->created_at = date('y-m-d');
        $company->save();
        return redirect()->route('companies.index')->with('success', 'bedrijf succesvol aangemaakt');
    }
    public function edit(Company $company)
    {
        $this->authorize('isAdmin',  User::class);
        return view('admin.company.edit', compact('company'));
    }
    public function update(companyEditValidation $request, Company $company)
    {
        $this->authorize('isAdmin',  User::class);
        $company->company_name = $request->company_name;
        $company->contact_person = $request->contact_person;
        $company->address = $request->address;
        $company->postal_code = $request->postal_code;
        $company->city = $request->city;
        $company->phone = $request->phone_number;
        $company->email = $request->email;
        if ($request->logo) {
            $imageName = time() . uniqid() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $imageName);
            $company->logo = $imageName;
        }
        $company->created_at = date('y-m-d');
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Bedrijf succesvol aangepast');
    }
    public function destroy(Company $company)
    {
        $this->authorize('isAdmin',  User::class);
        $company->delete();
        return redirect()->route('companies.index')
            ->with('success', 'Bedrijf succesvol verwijderd');
    }
    public function userIndex(Company $company)
    {
        $this->authorize('isAdmin',  User::class);
        $allRoles = role::all();
        $allUsers = User::all();
        $companyUsers = $company->users;
        $selectUsers =  $allUsers->diff($companyUsers);
        $roles = $company->roles;

        return view('admin.company.indexUser', compact(
            'company',
            'companyUsers',
            'roles',
            'selectUsers',
            'allRoles'
        ));
    }
    public function userAdd(Company $company, Request $request)
    {
        $this->authorize('isAdmin',  User::class);
        //check if the request data is in the database from the table company_users
        $check = CompanyUser::where('user_id', $request->user)
            ->where('company_id', $company->id)
            ->where('role_id', $request->role)
            ->first();
        //if the data is not in the database then add it
        if (!$check) {
            $companyUser = new CompanyUser();
            $companyUser->user_id = $request->user;
            $companyUser->company_id = $company->id;
            $companyUser->role_id = $request->role;
            $companyUser->save();
            return redirect()->route('companies.users', $company)->with('success', 'Gebruiker succesvol toegevoegd');
        } else {
            return redirect()->route('companies.users', $company)->with('error', 'Gebruiker bestaat al');
        }
    }
    public function userDestroy(Company $company, User $user)
    {
        $this->authorize('isAdmin',  User::class);
        $companyUser = CompanyUser::where('user_id', $user->id)
            ->where('company_id', $company->id)
            ->first();
        $companyUser->delete();
        return redirect()->route('companies.users', $company)->with('success', 'Gebruiker succesvol verwijderd');
    }
    public function userEdit(Company $company, User $user)
    {
        $this->authorize('isAdmin',  User::class);
        $roles = role::all();
        $companyUser = CompanyUser::where('user_id', $user->id)
            ->where('company_id', $company->id)
            ->first();
        $selectedId = $companyUser->role_id;
        return view('admin.company.editUser', compact('company', 'user', 'roles', 'selectedId', 'companyUser'));
    }
    public function userUpdate(company $company, Request $request)
    {
        $this->authorize('isAdmin',  User::class);
        $companyUser = CompanyUser::where('user_id', $request->user)
            ->where('company_id', $company->id)
            ->first();
        $companyUser->role_id = $request->rollen;
        $companyUser->save();
        return redirect()->route('companies.users', $company)->with('success', 'Gebruiker succesvol aangepast');
    }
    public function guotesIndex(company $company)
    {
        $this->authorize('isAdmin',  User::class);
        $guotes = $company->guotes;
        return view('admin.company.indexGuotes', compact('company', 'guotes'));
    }
    public function email(Company $company, Request $request)
    {
        $this->authorize('isAdmin',  User::class);
        $quote = quotes::where("id", $request->quote)->first();
        Mail::send('mail.quote', compact(
            'quote',
            'company'
        ), function ($message) use ($company, $quote) {
            $message->to($company->email)->subject($quote->quotes_number);
            if ($quote->file) {
                $message->attach(public_path('docs/' . $quote->file));
            }
        });
        return redirect()->route('companies.guotes', $company)->with('success', 'Email succesvol verzonden');
    }
   //showquote
    public function showQuote(company $company, quotes $quote)
    {
        $this->authorize('isAdmin',  User::class);
        return view('admin.company.showQuote', compact('company', 'quote'));
    } 
}
