<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::where('is_active', true)->orderBy('sort_order')->get();
        
        $legalPackages = $packages->where('type', 'legal');
        $techPackages = $packages->where('type', 'tech');

        return view('pages.packages', compact('legalPackages', 'techPackages'));
    }
}
