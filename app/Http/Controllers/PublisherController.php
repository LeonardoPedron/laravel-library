<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){
        return view('library.publishers.index', [
            "publishers" => Publisher::all()
        ]);
    }
}
