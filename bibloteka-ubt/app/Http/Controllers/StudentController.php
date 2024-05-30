<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\CheckInHistory;
use Exception;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        
        return view('students', compact('students'));

    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'age' => 'required|integer|min:1',
                'student_id' => 'required',
                'study_field' => 'required'
            ], [
                'name.required' => 'The name is required and cannot be empty.',
                'name.string' => 'The name must be a string.',
                'name.max' => 'The name may not be greater than 255 characters.',
                'age.required' => 'The age is required and cannot be empty.',
                'age.integer' => 'The age must be an integer.',
                'age.min' => 'The age must be at least 1.',
                'student_id.required' => 'The student ID is required and cannot be empty.',
                'study_field.required' => 'The study field is required and cannot be empty.'
            ]);

            Student::create([
                'name' => $request->name,
                'age' => $request->age,
                'student_id' => $request->student_id,
                'study_field' => $request->study_field,
            ]);

            notify()->success(__('Student has been added successfully!'));
            return redirect()->route('students')->with('success', 'Student created successfully.');
        } catch (Exception $e) {
            notify()->error('Failed to add student: ' . $e->getMessage());
            return redirect()->route('students')->with('error', 'Failed to add student.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'sometimes|string|max:255',
                'age' => 'sometimes|integer|min:1',
                'student_id' => 'sometimes',
                'study_field' => 'sometimes'
            ], [
                'name.string' => 'The name must be a string.',
                'name.max' => 'The name may not be greater than 255 characters.',
                'age.integer' => 'The age must be an integer.',
                'age.min' => 'The age must be at least 1.'
            ]);

            $student = Student::findOrFail($id);

            $student->update([
                'name' => $request->name,
                'age' => $request->age,
                'student_id' => $request->student_id,
                'study_field' => $request->study_field,
            ]);

            notify()->success('Student updated successfully!');
            return redirect()->route('students')->with('success', 'Student updated successfully.');
        } catch (Exception $e) {
            notify()->error('Failed to update student: ' . $e->getMessage());
            return redirect()->route('students')->with('error', 'Failed to update student.');
        }
    }



    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

            notify()->success('Student deleted successfully!');
            return redirect()->route('students')->with('success', 'Student deleted successfully.');
        } catch (Exception $e) {
            notify()->error('Failed to delete student: ' . $e->getMessage());
            return redirect()->route('students')->with('error', 'Failed to delete student.');
        }
    }


   public function search(Request $request)
    {
        try {
            $query = Student::query();
            $searchQuery = $request->input('query');

            if (is_numeric($searchQuery)) {
                $query->where('student_id', $searchQuery);
            } else {
                $query->where('name', 'like', '%' . $searchQuery . '%');
            }

            $students = $query->get();
            return view('students', compact('students'));
        } catch (Exception $e) {
            notify()->error('Failed to search students: ' . $e->getMessage());
            return redirect()->route('students')->with('error', 'Failed to search students.');
        }
    }

    
    public function checkIn(Request $request)
    {
        try {
            $request->validate([
                'student_id' => 'required|exists:students,student_id',
            ]);
    
            $student = Student::where('student_id', $request->student_id)->firstOrFail();
    

            $lastCheckIn = CheckInHistory::where('student_id', $student->id)->orderBy('timestamp', 'desc')->first();
    
            if ($lastCheckIn && $lastCheckIn->action == 'checked in') {

                CheckInHistory::create([
                    'student_id' => $student->id,
                    'action' => 'checked out',
                    'timestamp' => now(),
                ]);
    
                notify()->success('Student checked out successfully!');
                return redirect()->route('dashboard')->with('success', 'Student checked out successfully.');
            } else {

                CheckInHistory::create([
                    'student_id' => $student->id,
                    'action' => 'checked in',
                    'timestamp' => now(),
                ]);
    
                notify()->success('Student checked in successfully!');
                return redirect()->route('dashboard')->with('success', 'Student checked in successfully.');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            notify()->error('Student not found!');
            return redirect()->route('dashboard')->withErrors('Student not found.');
        } catch (\Illuminate\Validation\ValidationException $e) {

            notify()->error( $e->getMessage());
            return redirect()->route('dashboard')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
    
            notify()->error('An unexpected error occurred: ' . $e->getMessage());
            return redirect()->route('dashboard')->withErrors('An unexpected error occurred. Please try again.');
        }
    }


    public function orderByLatest()
{
    $students = Student::orderBy('created_at', 'desc')->get();
    return view('students', compact('students'));
}

public function orderByEarliest()
{
    $students = Student::orderBy('created_at', 'asc')->get();
    return view('students', compact('students'));
}

public function filterByDegree(Request $request)
{
    $request->validate([
        'study_field' => 'required|string'
    ], [
        'study_field.required' => 'The study field is required and cannot be empty.'
    ]);

    $students = Student::where('study_field', $request->study_field)->get();
    return view('students', compact('students'));
}


}
