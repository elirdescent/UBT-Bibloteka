<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;

class LoanController extends Controller
{
    public function index()
{
    $loans = Loan::with('book', 'student')->get();
    $books = Book::whereDoesntHave('loans', function (Builder $query) {
        $query->whereNull('returned_at');
    })->get();
    $students = Student::all();

    return view('loans', compact('loans', 'books', 'students'));
}
public function store(Request $request)
{
    $request->validate([
        'book_id' => 'required|exists:books,id',
        'student_id' => 'required|exists:students,id',
    ]);

    // Set borrowed_at to the current date and time
    $borrowed_at = now();

    // Create the loan record with the borrowed_at date
    $loan = Loan::create([
        'book_id' => $request->book_id,
        'student_id' => $request->student_id,
        'borrowed_at' => $borrowed_at,
        'returned_at' => null,
    ]);

    notify()->success('Loan created successfully!');
    return redirect()->route('loans');
}

 
public function update(Request $request, $id)
{
    $request->validate([
        'book_id' => 'required|exists:books,id',
        'student_id' => 'required|exists:students,id',
        'loaned_at' => 'required|date',
        'returned_at' => 'nullable|date',
    ]);

    $loan = Loan::findOrFail($id);
    $loan->update($request->all());

    notify()->success('Loan updated successfully!');
    return redirect()->route('loans');
}

public function destroy($id)
{
    $loan = Loan::findOrFail($id);
    $loan->delete();

    notify()->success('Loan deleted successfully!');
    return redirect()->route('loans');
}


public function returnBook($id)
{
    $loan = Loan::findOrFail($id);
    $loan->returned_at = now();
    $loan->save();

    notify()->success('Book returned successfully!');
    return redirect()->route('loans');
}


}
