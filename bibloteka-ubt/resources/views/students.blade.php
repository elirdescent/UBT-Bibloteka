<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    @notifyCss

    
</head>



<!-- ADD STUDENT MODAL    !-->
<input type="checkbox" id="my_modal_add" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900">

    <form method="POST" class="bg-gray-900 p-5 rounded-lg min-w-full">
        @csrf
        <h1 class="text-center text-2xl mb-6 text-blue-500 font-bold font-sans">Add a Student</h1>
        <div>
            <label class="text-gray-500 font-semibold block  text-md" for="name">Name</label>
            <input class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="name" id="name"  />
  </div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="name">Age</label>
    <input class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="number" name="age" id="age"  />
</div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="student_id">ID</label>
    <input class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="student_id" id="student_id"  />
</div>

<div>
    <label class="text-gray-500 font-semibold block text-md" for="options">Options</label>
    <select class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" name="study_field" id="study_field">
        <option value="CSE">Computer Science & Engineering</option>
        <option value="MED">General Medicine</option>
        <option value="MBE">Business Management & Economy</option>
        <option value="BIO">Biotechnology</option>
    </select>
</div>
  
                        <button type="submit" class="w-full mt-6 bg-blue-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Save</button>
    </form>
  </div>
  <label class="modal-backdrop" for="my_modal_add">Close</label>
</div>
<!-- ADD STUDENT MODAL    !-->


@foreach($students as $student)

<!-- DELETE STUDENT MODAL    !-->
<input type="checkbox" id="my_modal_delete_{{$student->id}}" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900">
    <h3 class="text-2xl text-red-500 font-bold ">Warning!</h3>
    <p class="pt-4">You are about to delete a student.</p>
    <p class="">Once deleted, the data cannot be recovered.</p>
    <form action="{{ route('students.destroy', $student->id) }}" method="POST" >
        @csrf
        @method('DELETE')
    <button type="submit" class="btn mt-5 bg-red-500  flex justify-end">Delete</button>
    </form>
  </div>
  <label class="modal-backdrop" for="my_modal_delete_{{$student->id}}">Close</label>
</div>
<!-- DELETE STUDENT MODAL    !-->


<!-- EDIT STUDENT MODAL    !-->
<input type="checkbox" id="my_modal_edit_{{$student->id}}" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900">
    <form action="{{ route('students.update', $student->id) }}" method="POST" class="bg-gray-900 p-5 rounded-lg min-w-full">
        @csrf
        @method('PUT')
        <h1 class="text-center text-2xl mb-6 text-blue-500 n font-bold font-sans">Edit Student</h1>
        <div>
            <label class="text-gray-500 font-semibold block  text-md" for="name">Name</label>
            <input value="{{ $student->name }}"  class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="name" id="name"  />
  </div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="name">Age</label>
    <input value="{{ $student->age }}" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="number" name="age" id="age"  />
</div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="student_id">ID</label>
    <input value="{{ $student->student_id }}" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="student_id" id="student_id"  />
</div>

<div>
    <label class="text-gray-500 font-semibold block text-md" for="options">Options</label>
    <select value="{{ $student->study_field }}" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" name="study_field" id="study_field">
        <option value="CSE">Computer Science & Engineering</option>
        <option value="MED">General Medicine</option>
        <option value="MBE">Business Management & Economy</option>
        <option value="BIO">Biotechnology</option>
    </select>
</div>
  
                        <button type="submit" class="w-full mt-6 bg-blue-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Save</button>
    </form>
  </div>
  <label class="modal-backdrop" for="my_modal_edit_{{$student->id}}">Close</label>
</div>
<!-- EDIT STUDENT MODAL    !-->

@endforeach

<body class="">
    <x-app-layout>
     
        <div class="flex justify-center">
            
        <div class="bg-gray-800 p-8 mt-10 mx-20  rounded-md w-full">
            <div class=" flex items-center justify-between pb-6">
                <div>

                
                </div>

              
                <div class="flex items-center w-full  mx-3 rounded bg-gray-900">
                   
                    <form action="{{ route('students.search') }}" class="flex justify-between w-full" method="GET">
                    <input class=" w-full border-none bg-transparent px-4 py-1 text-gray-400 outline-none focus:outline-none " type="search" name="query" placeholder="Search..." />
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


                <div class="flex items-center justify-start  ">
                    <details class="dropdown m-2 ">
                        <summary class="m-1 btn bg-gray-900 "><svg class="h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 4.6C3 4.03995 3 3.75992 3.10899 3.54601C3.20487 3.35785 3.35785 3.20487 3.54601 3.10899C3.75992 3 4.03995 3 4.6 3H19.4C19.9601 3 20.2401 3 20.454 3.10899C20.6422 3.20487 20.7951 3.35785 20.891 3.54601C21 3.75992 21 4.03995 21 4.6V6.33726C21 6.58185 21 6.70414 20.9724 6.81923C20.9479 6.92127 20.9075 7.01881 20.8526 7.10828C20.7908 7.2092 20.7043 7.29568 20.5314 7.46863L14.4686 13.5314C14.2957 13.7043 14.2092 13.7908 14.1474 13.8917C14.0925 13.9812 14.0521 14.0787 14.0276 14.1808C14 14.2959 14 14.4182 14 14.6627V17L10 21V14.6627C10 14.4182 10 14.2959 9.97237 14.1808C9.94787 14.0787 9.90747 13.9812 9.85264 13.8917C9.7908 13.7908 9.70432 13.7043 9.53137 13.5314L3.46863 7.46863C3.29568 7.29568 3.2092 7.2092 3.14736 7.10828C3.09253 7.01881 3.05213 6.92127 3.02763 6.81923C3 6.70414 3 6.58185 3 6.33726V4.6Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></summary>
                        <ul class="p-2 shadow menu  dropdown-content z-[1] bg-gray-900 rounded-box w-52">
                          <li class=""><a href="{{ route('students.order.latest') }}">Sort by Latest Registered</a></li>
                          <li><a href="{{ route('students.order.earliest') }}" >Sort by Earliest Registered</a></li>
                        </ul>
                      </details>
    
    
                      <form class="flex " action="{{ route('students.filter.degree') }}" method="GET">
                        <select class="w-1/2 bg-gray-900 rounded-lg border-none  focus:outline-none" name="study_field" id="study_field">
                            <option value="CSE">Computer Science & Engineering</option>
                            <option value="MED">General Medicine</option>
                            <option value="MBE">Business Management & Economy</option>
                            <option value="BIO">Biotechnology</option>
                        </select>
                        <button type="submit" class="btn ml-2 bg-blue-600 text-white">Filter</button>
                    </form>
                </div>
                    <div class="-mx-4  sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full  leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                           Department
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                           Date Registered
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                            Age
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-800 bg-gray-900 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- STUDENT ROW !-->
                                    @foreach($students as $student)
                                    <tr>
                                        <td class="px-5 py-5 border-b-4 border-gray-500  bg-gray-700 text-sm">
                                            <div class="flex items-center border-none">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <svg  viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M0.877014 7.49988C0.877014 3.84219 3.84216 0.877045 7.49985 0.877045C11.1575 0.877045 14.1227 3.84219 14.1227 7.49988C14.1227 11.1575 11.1575 14.1227 7.49985 14.1227C3.84216 14.1227 0.877014 11.1575 0.877014 7.49988ZM7.49985 1.82704C4.36683 1.82704 1.82701 4.36686 1.82701 7.49988C1.82701 8.97196 2.38774 10.3131 3.30727 11.3213C4.19074 9.94119 5.73818 9.02499 7.50023 9.02499C9.26206 9.02499 10.8093 9.94097 11.6929 11.3208C12.6121 10.3127 13.1727 8.97172 13.1727 7.49988C13.1727 4.36686 10.6328 1.82704 7.49985 1.82704ZM10.9818 11.9787C10.2839 10.7795 8.9857 9.97499 7.50023 9.97499C6.01458 9.97499 4.71624 10.7797 4.01845 11.9791C4.97952 12.7272 6.18765 13.1727 7.49985 13.1727C8.81227 13.1727 10.0206 12.727 10.9818 11.9787ZM5.14999 6.50487C5.14999 5.207 6.20212 4.15487 7.49999 4.15487C8.79786 4.15487 9.84999 5.207 9.84999 6.50487C9.84999 7.80274 8.79786 8.85487 7.49999 8.85487C6.20212 8.85487 5.14999 7.80274 5.14999 6.50487ZM7.49999 5.10487C6.72679 5.10487 6.09999 5.73167 6.09999 6.50487C6.09999 7.27807 6.72679 7.90487 7.49999 7.90487C8.27319 7.90487 8.89999 7.27807 8.89999 6.50487C8.89999 5.73167 8.27319 5.10487 7.49999 5.10487Z" fill="#ffffff"></path> </g></svg>
                                                </div>
                                                    <div class="ml-3">
                                                        <p class="text-gray-300 whitespace-no-wrap">
                                                            {{$student->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                        </td>

                                        <td class="px-5 py-5 border-b-4 border-gray-500  bg-gray-700 text-sm">
                                            <div class="flex items-center border-none">
                                               
                                         
                                                        <p class="text-gray-300 whitespace-no-wrap">
                                                            {{$student->student_id}}
                                                        </p>
                                                   
                                                </div>
                                        </td>
                                        <td class="px-5 py-5 border-b-4 border-gray-500    bg-gray-700 text-sm">
                                            <p class="text-gray-300 whitespace-no-wrap">{{$student->study_field}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b-4 border-gray-500    bg-gray-700 text-sm">
                                            <p class="text-gray-300 whitespace-no-wrap">
                                                {{ $student->created_at->format('Y-m-d') }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b-4 border-gray-500   bg-gray-700 text-sm">
                                            <p class="text-gray-300 whitespace-no-wrap">
                                            {{$student->age}}
                                            </p>
                                        </td>

                  
                                        <td class="px-5 py-5 border-b-4 border-gray-500    bg-gray-700 text-sm">
                                            <div class="flex justify-around">
                                                
                                          <label for="my_modal_delete_{{$student->id}}" class="btn  btn-sm btn-circle bg-red-500 hover:bg-red-800 border-none">
                                            <svg class="h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                          </label>
                                          <label for="my_modal_edit_{{$student->id}}" class="btn btn-sm btn-circle bg-yellow-600 hover:bg-yellow-700 border-none">
                                            <svg class="h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                          </label>
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
                                <div class="inline-flex mt-2 xs:mt-0">
                                    <button
                                        class="text-sm text-indigo-50 transition duration-150 hover:bg-blue-800 bg-blue-600 font-semibold py-2 px-4 rounded-l">
                                        Prev
                                    </button>
                                    &nbsp; &nbsp;
                                    <button
                                        class="text-sm text-indigo-50 transition duration-150 hover:bg-blue-800 bg-blue-600 font-semibold py-2 px-4 rounded-r">
                                        Next
                                    </button>
                                </div>
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