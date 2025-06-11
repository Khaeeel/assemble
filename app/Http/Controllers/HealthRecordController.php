<?php

namespace App\Http\Controllers;

use App\Models\HealthRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;  // make sure this is imported at the top
class HealthRecordController extends Controller
{
    // Show blank form
    
    
    public function create()
    {
        return view('health-records.form');
    }
    public function index()
{
    $healthRecords = HealthRecord::all();    
    $healthRecords = HealthRecord::orderBy('created_at', 'desc')->paginate(10); // 10 per page
    return view('health_records', compact('healthRecords'));
}


public function countToday()
{
    $today = Carbon::today()->toDateString();  // simplified
    $records = HealthRecord::whereDate('created_at', $today)->get();

    return response()->json([
        'today' => $today,
        'count' => $records->count(),
        'records' => $records
    ]);
}

    public function countTotal()
    {
        $countTotal = HealthRecord::count();
        return response()->json(['count' => $countTotal]);
    }
    

    // Store new record
   public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'age' => 'required|integer',
        'gender' => 'required|string',
        'birth_date' => 'required|string|max:50',
        'height' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'contact_number' => 'nullable|string|max:20',
        'address' => 'required|string',
        'visit_purpose' => 'required_without:medical_diagnosis|array',
        'visit_purpose.*' => 'string',
        'other_purpose' => 'nullable|string',
        'medical_diagnosis' => 'required_without:visit_purpose|array',
        'medical_diagnosis.*' => 'string',
        'other_diagnosis' => 'nullable|string',
        'given_medicine' => 'nullable|string',
    ]);

    // Validate that at least one of the two is provided
    if (empty($request->visit_purpose) && empty($request->medical_diagnosis)) {
        return back()->withErrors([
            'visit_purpose' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
            'medical_diagnosis' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
        ])->withInput();
    }

    // Handle "Others" logic for visit purpose
    $purposes = $request->visit_purpose ?? [];
    if (in_array('Others', $purposes) && $request->filled('other_purpose')) {
        $purposes = array_diff($purposes, ['Others']);
        $purposes[] = $request->other_purpose;
    }

    // Handle "Others" logic for diagnosis
    $diagnoses = $request->medical_diagnosis ?? [];
    if (in_array('Others', $diagnoses) && $request->filled('other_diagnosis')) {
        $diagnoses = array_diff($diagnoses, ['Others']);
        $diagnoses[] = $request->other_diagnosis;
    }

    // Store all data
    $record = HealthRecord::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'age' => $validated['age'],
        'gender' => $validated['gender'],
        'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
        'height' => $validated['height'],
        'weight' => $validated['weight'],
        'contact_number' => $validated['contact_number'],
        'address' => $validated['address'],
        'visit_purpose' => json_encode($purposes),
        'medical_diagnosis' => json_encode($diagnoses),
        'given_medicine' => $validated['given_medicine'],
        'other_purpose' => $request->other_purpose,
        'other_diagnosis' => $request->other_diagnosis,
    ]);

    return redirect()->back()->with('success', 'Health record added successfully!');
}


public function update(Request $request, $id)
{
    $record = HealthRecord::findOrFail($id); // 🟢 fetch first, to access existing values

    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'age' => 'required|integer',
        'birth_date' => 'required|date',
        'gender' => 'required|string',
        'height' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'contact_number' => 'nullable|string|max:20',
        'address' => 'required|string',
        'visit_purpose' => 'nullable|array',
        'visit_purpose.*' => 'string',
        'medical_diagnosis' => 'nullable|array',
        'medical_diagnosis.*' => 'string',
        'other_purpose' => 'nullable|string',
        'other_diagnosis' => 'nullable|string',
        'given_medicine' => 'nullable|string',
    ]);

    // 🛠️ Get values from request OR fallback to existing data
    $visitPurpose = $request->visit_purpose ?? json_decode($record->visit_purpose, true);
    $medicalDiagnosis = $request->medical_diagnosis ?? json_decode($record->medical_diagnosis, true);

    if (empty($visitPurpose) && empty($medicalDiagnosis)) {
        return back()->withErrors([
            'visit_purpose' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
            'medical_diagnosis' => 'Please provide at least a Visit Purpose or a Medical Diagnosis.',
        ])->withInput();
    }

    try {
    $formattedDate = Carbon::createFromFormat('m/d/Y', $request->birth_date)->format('Y-m-d');
} catch (\Exception $e) {
    $formattedDate = $request->birth_date; // fallback to original
}


    

    // Handle "Others"
    $validated['visit_purpose'] = $request->visit_purpose === 'Others'
        ? $request->other_purpose
        : $request->visit_purpose;

    $validated['medical_diagnosis'] = $request->medical_diagnosis === 'Others'
        ? $request->other_diagnosis
        : $request->medical_diagnosis;
        $validated['birth_date'] = date('Y-m-d', strtotime($request->birth_date));


    // Find and update the record
    $record = HealthRecord::findOrFail($id);
    $record->fill($validated);
    $record->other_purpose = $request->other_purpose ?? null;
    $record->other_diagnosis = $request->other_diagnosis ?? null;
    $record->save();

    $record->medical_diagnosis = json_encode($request->medical_diagnosis);
    $record->visit_purpose = json_encode($request->visit_purpose);
    $request->validate([
        // other fields...
        'birth_date' => 'required|date',
    ]);

    $record = HealthRecord::findOrFail($id);
    $record->update([
        // other fields...
        'birth_date' => $request->birth_date,
    ]);


    return redirect()->route('health.records')->with('success', 'Health record updated successfully!');
}

public function destroy($id)
{
    HealthRecord::findOrFail($id)->delete();
    return redirect()->route('health.records')->with('success', 'Patient record deleted successfully.');
}

}

