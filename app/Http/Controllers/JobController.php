<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Job;

class JobController extends Controller
{
    
    public function index(Request $request)
    {
        $input = $request->all();
        $contact = $input['contact'];
        $job = $input['job'][0];

        $jobOnDb = DB::transaction(function() use ($contact, $job) {
            // Create Contact
            $contactOnDb = Contact::create([
                'first_name' => $contact['firstName'],
                'last_name' => $contact['lastName'],
                'email' => $contact['email'],
                'company_name' => $contact['company'],
            ]);

            // Create Job
            $jobOnDb = $contactOnDb->jobs()->create([
                'type' => $job['type'],
                'make' => $job['make'],
                'model' => $job['model'],
                'car_type' => $job['carType'],
                'year' => $job['year'],
                'color' => $job['color'],
                'vin' => $job['vin'],
                'license' => $job['type'],
            ]);

            foreach ($job['services'] as $service) {
                // Create Service on Job
                $serviceOnDb = $jobOnDb->services()->create([
                    'type' => $service['type'],
                    'mobile_install' => $service['mobileInstall'],            
                ]);

                foreach ($service['applications'] as $application) {
                    // Create Service Application
                    $appOnDb = $serviceOnDb->serviceApplications()->create([
                        'area' => $application['area'],
                        'film_removal' => $application['filmRemoval'],
                    ]);
                    
                    // Create Films
                    $appOnDb->films()->createMany($application['films']);
                }
            }

            return $jobOnDb;
        });

        return response()->json(['job_id' => $jobOnDb->id]);
    }
}
