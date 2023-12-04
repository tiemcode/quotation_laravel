<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class companyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function hasCompany(User $user, Company $company)
    {
        return ($user->companies->contains($company));
    }
    //hasrole
    public function isOwner(User $user, Company $company)
    {
        $owner_role = role::where('name', 'eigenaar')->first();

        return $user->roles()
            ->where('company_id', $company->id)
            ->where('role_id', $owner_role->id)
            ->exists();
    }
}
