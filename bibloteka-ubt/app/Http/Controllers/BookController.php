<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Exception;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        
        return view('books', compact('books'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'isbn' => 'required',
            'author' => 'required|string|max:255',
            'description' => 'required'
        ], [
            'title.required' => 'The title is required and cannot be empty.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'category.required' => 'The category is required and cannot be empty.',
            'category.string' => 'The category must be a string.',
            'category.max' => 'The category may not be greater than 255 characters.',
            'isbn.required' => 'The Book Code is required and cannot be empty.',
            'author.required' => 'The author is required and cannot be empty.',
            'author.string' => 'The author must be a string.',
            'author.max' => 'The author may not be greater than 255 characters.',
            'description.required' => 'The description is required and cannot be empty.'
        ]);

        try {
            Book::create([
                'title' => $request->title,
                'category' => $request->category,
                'isbn' => $request->isbn,
                'author' => $request->author,
                'description' => $request->description
            ]);

            notify()->success('Book has been added successfully!');
            return redirect()->route('books')->with('success', 'Book created successfully.');
        } catch (Exception $e) {
            notify()->error('Failed to add book: ' . $e->getMessage());
            return redirect()->route('books')->with('error', 'Failed to add book.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
            'isbn' => 'sometimes',
            'author' => 'sometimes|string|max:255',
            'description' => 'sometimes'
        ], [
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'category.string' => 'The category must be a string.',
            'category.max' => 'The category may not be greater than 255 characters.',
            'isbn.regex' => 'The book code must be a valid number.',
            'author.string' => 'The author must be a string.',
            'author.max' => 'The author may not be greater than 255 characters.'
        ]);

        try {
            $book = Book::findOrFail($id);

            $book->update([
                'title' => $request->title,
                'category' => $request->category,
                'isbn' => $request->isbn,
                'author' => $request->author,
                'description' => $request->description
            ]);

            notify()->success('Book updated successfully!');
            return redirect()->route('books')->with('success', 'Book updated successfully.');
        } catch (Exception $e) {
            notify()->error('Failed to update book: ' . $e->getMessage());
            return redirect()->route('books')->with('error', 'Failed to update book.');
        }
    }

    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();

            notify()->success('Book deleted successfully!');
            return redirect()->route('books')->with('success', 'Book deleted successfully.');
        } catch (Exception $e) {
            notify()->error('Failed to delete book: ' . $e->getMessage());
            return redirect()->route('books')->with('error', 'Failed to delete book.');
        }
    }

    public function search(Request $request)
    {
        try {
            $query = Book::query();
            $searchQuery = $request->input('query');

            if (is_numeric($searchQuery)) {
                $query->where('isbn', $searchQuery);
            } else {
                $query->where('title', 'like', '%' . $searchQuery . '%')
                      ->orWhere('isbn', 'like', '%' . $searchQuery . '%')
                      ->orWhere('author', 'like', '%' . $searchQuery . '%');
            }

            $books = $query->get();
            return view('books', compact('books'));
        } catch (Exception $e) {
            notify()->error('Failed to search books: ' . $e->getMessage());
            return redirect()->route('books')->with('error', 'Failed to search books.');
        }
    }


    public function filterByCategory(Request $request)
    {
        try {
            $request->validate([
                'category' => 'required|string'
            ], [
                'category.required' => 'The category field is required.'
            ]);
    
            $books = Book::where('category', $request->category)->get();
            
            return view('books', compact('books'));
        } catch (Exception $e) {
            notify()->error('Failed to fetch books by category: ' . $e->getMessage());
            return redirect()->route('books')->with('error', 'Failed to fetch books by category.');
        }
    }

    

        
    

   
}












  


