<?php

namespace App\Observers;

use App\Company;



class CompanyObserver
{
    /**
     * Handle the company "created" event.
     *
     * @param  \App\Company  $company
     * @return void
     */
    public function creating(Company $company)
    {
        if(!$company){
            return back()->withInput()->with('errors', 'Error creating new Company');
        }
    }

    /**
     * Handle the company "updated" event.
     *
     * @param  \App\Company  $company
     * @return void
     */
    public function updating(Company $company)
    {
        if(!$company){
            return back()->withInput()->with('errors', 'Error Updating the Company');
        }

    }

    /**
     * Handle the company "deleted" event.
     *
     * @param  \App\Company  $company
     * @return void
     */
    public function deleting(Company $company)
    {
        if($company){
            return redirect()->route('companies.index')
            ->with('error' , 'Company could not be Deleted');
        }
    }



}
