<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with(['company', 'category'])->get();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $companies = Company::all();
        $categories = Category::all();
        return view('jobs.create', compact('companies', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);
        Job::create($request->all());
        return redirect()->route('jobs.index');
    }

    public function edit(Job $job)
    {
        $companies = Company::all();
        $categories = Category::all();
        return view('jobs.edit', compact('job', 'companies', 'categories'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'company_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);
        $job->update($request->all());
        return redirect()->route('jobs.index');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }

    public function show(Job $job)
    {
        $job->load(['company', 'category']);
        return view('jobs.show', compact('job'));
    }
}
