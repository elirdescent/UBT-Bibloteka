<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Loans</title>
    @notifyCss

    
</head>



<!-- ADD LOAN MODAL    !-->
<input type="checkbox" id="my_modal_add" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900">

    <form method="POST" action="{{ route('loans.store') }}" class="bg-gray-900 p-5 rounded-lg min-w-full">
        @csrf
        <h1 class="text-center text-2xl mb-6 text-blue-500 font-bold font-sans">Add a Book Loan</h1>
        <div>
            <label class="text-gray-500 font-semibold block  text-md" for="book">Book</label>
            <select class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" name="book_id" id="book_id"  required>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
  </div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="student">Student</label>
    <select class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" name="student_id" id="student_id"  required>
        @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
    </select>
</div>

  
                        <button type="submit" class="w-full mt-6 bg-blue-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Save</button>
    </form>
  </div>
  <label class="modal-backdrop" for="my_modal_add">Close</label>
</div>
<!-- ADD LOAN MODAL    !-->


@foreach($loans as $loan)

<!-- DELETE LOAN MODAL    !-->
<input type="checkbox" id="my_modal_delete_{{$loan->id}}" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900">
    <h3 class="text-2xl text-red-500 font-bold ">Warning!</h3>
    <p class="pt-4">You are about to delete a book loan.</p>
    <p class="">Once deleted, the data cannot be recovered.</p>
    <form action="{{ route('students.destroy', $student->id) }}" method="POST" >
        @csrf
        @method('DELETE')
    <button type="submit" class="btn mt-5 bg-red-500  flex justify-end">Delete</button>
    </form>
  </div>
  <label class="modal-backdrop" for="my_modal_delete_{{$loan->id}}">Close</label>
</div>
<!-- DELETE LOAN MODAL!-->


<!-- EDIT LOAN MODAL!-->
<input type="checkbox" id="my_modal_edit_{{$loan->id}}" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900">
    <form action="{{ route('loans.update', $loan->id) }}" method="POST" class="bg-gray-900 p-5 rounded-lg min-w-full">
        @csrf
        @method('PUT')
        <h1 class="text-center text-2xl mb-6 text-blue-500 n font-bold font-sans">Edit Student</h1>
        <div>
            <label class="text-gray-500 font-semibold block  text-md" for="book_id">Book</label>
            <select name="book_id" id="book_id" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" required>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $book->id == $loan->book_id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
  </div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="student_id">Student</label>
    <select name="student_id" id="student_id" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" required>
        @foreach ($students as $student)
        <option value="{{ $student->id }}" {{ $student->id == $loan->student_id ? 'selected' : '' }}>
            {{ $student->name }}
        </option>
    @endforeach
    </select>
</div>



<div>
    <label class="text-gray-500 font-semibold block text-md" for="loaned_at">Loaned At</label>
    <input type="date" name="loaned_at" id="loaned_at" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" value="{{ $loan->loaned_at }}" required>
</div>

<div>
    <label class="text-gray-500 font-semibold block text-md" for="options">Returned At</label>
    <input type="date" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" name="returned_at" id="returned_at" class="form-control" value="{{ $loan->returned_at }}">
</div>
  
                        <button type="submit" class="w-full mt-6 bg-blue-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Update Loan</button>
    </form>
  </div>
  <label class="modal-backdrop" for="my_modal_edit_{{$loan->id}}">Close</label>
</div>
<!-- EDIT STUDENT MODAL    !-->

@endforeach

<body class="">
    <x-app-layout>
     
        <div class="flex justify-center">
            
        <div class="bg-gray-800 p-8 mt-10 mx-20  rounded-md w-full">
            <div class=" flex items-center justify-between pb-6">
                <div>
                    <h2 class="text-blue-500 font-semibold text-3xl">Loans</h2>
                
                </div>
              
                <div class="flex w-full mx-10 rounded bg-gray-900">
                    <form action="{{ route('loans.search') }}" class="flex justify-between w-full" method="GET">
                    <input class=" w-full border-none bg-transparent px-4 py-1 text-gray-400 outline-none focus:outline-none " type="search" name="search" placeholder="Search..." />
                    <button type="submit" class="m-2 rounded bg-blue-600 px-4 py-2 text-white">
                        <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </form>
                </div>
            
                <label for="my_modal_add" class="btn btn-circle bg-blue-600 hover:bg-blue-800 text-white border-none text-4xl">+</label>
                </div>
                <div>
                    <div class="-mx-4  sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full  leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                            Book
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                         Student
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                          Loaned At
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                            Returned At
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- STUDENT ROW !-->
                                    @foreach($loans as $loan)
                                    <tr>
                                        <td class="px-5 py-5 border-b-4 border-gray-500  bg-gray-700 text-sm">
                                            <div class="flex items-center border-none">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.6 3H8.4A2.4 2.4 0 0 0 6 5.4v11.2A2.4 2.4 0 0 0 8.4 19h11.2a2.4 2.4 0 0 0 2.4-2.4V5.4A2.4 2.4 0 0 0 19.6 3ZM9 8a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2h-8a1 1 0 0 1-1-1Zm1 2a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2h-8Zm-1 4a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2h-4a1 1 0 0 1-1-1Z" fill="#ffffff"></path><path d="M4 5a1 1 0 0 0-2 0v11.6C2 20.132 4.868 23 8.4 23H20a1 1 0 1 0 0-2H8.4A4.403 4.403 0 0 1 4 16.6V5Z" fill="#ffffff"></path></g></svg>                                                </div>
                                                    <div class="ml-3">
                                                        <p class="text-gray-300 whitespace-no-wrap">
                                                            {{ $loan->id }}
                                                        </p>
                                                    </div>
                                                </div>
                                        </td>

                                        <td class="px-5 py-5 border-b-4 border-gray-500  bg-gray-700 text-sm">
                                            <div class="flex items-center border-none">
                                               
                                         
                                                        <p class="text-gray-300 whitespace-no-wrap">
                                                            {{ $loan->book->title }}
                                                        </p>
                                                   
                                                </div>
                                        </td>
                                        <td class="px-5 py-5 border-b-4 border-gray-500    bg-gray-700 text-sm">
                                            <p class="text-gray-300 whitespace-no-wrap">{{ $loan->student->name }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b-4 border-gray-500    bg-gray-700 text-sm">
                                            <p class="text-gray-300 whitespace-no-wrap">
                                                {{ $loan->borrowed_at }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b-4 border-gray-500   bg-gray-700 text-sm">
                                            <p class="text-gray-300 whitespace-no-wrap">
                                                {{ $loan->returned_at ?? 'Not Returned' }}
                                            </p>
                                        </td>

                  
                                        <td class="px-5 py-5 border-b-4 border-gray-500    bg-gray-700 text-sm">
                                            <div class="flex justify-around items-center">
                                                
                                          <label for="my_modal_delete_{{$loan->id}}" class="btn  btn-sm btn-circle bg-red-500 hover:bg-red-800 border-none">
                                            <svg class="h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                          </label>
                                          <label for="my_modal_edit_{{$loan->id}}" class="btn btn-sm btn-circle bg-yellow-600 hover:bg-yellow-700 border-none">
                                            <svg class="h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                          </label>
                                          @if (is_null($loan->returned_at))
                                          <form action="{{ route('loans.return', $loan->id) }}" method="POST" style="display:inline-block;">
                                              @csrf
                                              @method('PATCH')
                                              <button type="submit" class="btn btn-sm btn-success text-gray-900 font-bold">Return</button>
                                          </form>
                                          @else
                                          <div class="opacity-0  btn-success text-gray-900 font-bold mx-8"> </div>
                                      @endif
                                      
                                        </div>
                                        </td>

                                        
                                    </tr>
                                    @endforeach
                                    <!-- STUDENT ROW !-->

                                    
                                   
                                </tbody>
                            </table>
                            <div
                                class="px-5 py-5 bg-gray-900 border-t border-gray-800 flex flex-col xs:flex-row items-center xs:justify-between          ">
                                <span class="text-xs xs:text-sm text-gray-900">
                                    Showing 1 to 4 of 50 Entries
                                </span>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    @include('notify::components.notify')
    @notifyJs
    
</body>
</html>