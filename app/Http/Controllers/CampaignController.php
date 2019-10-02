<?php

namespace App\Http\Controllers;


use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(Request $request) {
        return Campaign::with('donations')->get();
    }

    public function find(Request $request) {
        return Campaign::find($request->id);
    }

    public function create(Request $request) {
        return Campaign::create($request->all());
    }

    public function update(Request $request) {
        $campaign =  Campaign::find($request->id)->update($request->all());
        
        return [
            'status' => 'Success',
            'campaign' => $campaign
        ];
    }

    public function delete(Request $request) {
        Campaign::destroy($request->id);

        return [
            'status' => 'Success'
        ];
    }
}
