<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
   public function index(Request $request) {
        return Donation::get();
    }

    public function find(Request $request) {
        $donation = Donation::find($request->id);
        return $donation;
        // return Donation::with('campaign')->find($request->id);
    }

    public function create(Request $request) {
        return Donation::create($request->all());
    }

    public function update(Request $request) {
        $donation =  Donation::find($request->id)->update($request->all());
        
        return [
            'status' => 'Success',
            'donation' => $donation
        ];
    }

    public function delete(Request $request) {
        Donation::destroy($request->id);

        return [
            'status' => 'Success'
        ];
    }
}
