<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    @notifyCss
    @vite('resources/css/app.css')
</head>


@foreach($books as $book)

<!-- VIEW BOOK MODAL !-->
<input type="checkbox" id="my_modal_view_{{$book->id}}" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900 w-11/12 max-w-5xl ">
    <section class="bg-gray-900">
        <div class="container  py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <div class="mt-12 md:mt-0">
                    <svg viewBox="0 0 24 24" class="" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 19V6.2C4 5.0799 4 4.51984 4.21799 4.09202C4.40973 3.71569 4.71569 3.40973 5.09202 3.21799C5.51984 3 6.0799 3 7.2 3H16.8C17.9201 3 18.4802 3 18.908 3.21799C19.2843 3.40973 19.5903 3.71569 19.782 4.09202C20 4.51984 20 5.0799 20 6.2V17H6C4.89543 17 4 17.8954 4 19ZM4 19C4 20.1046 4.89543 21 6 21H20M9 7H15M9 11H15M19 17V21" stroke="#0033ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

                </div>
                <div class="max-w-lg">

                  @if ($book->isLoaned())
                    <div class="flex items-center mt-2 mb-2">
                        <svg class="h-6 opacity-50 mr-1 " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_11057)"> <path d="M5.63604 5.63598C4.00736 7.26466 3 9.51466 3 11.9999C3 16.9705 7.02944 20.9999 12 20.9999C14.4853 20.9999 16.7353 19.9926 18.364 18.3639M5.63604 5.63598C7.26472 4.0073 9.51472 2.99994 12 2.99994C16.9706 2.99994 21 7.02938 21 11.9999C21 14.4852 19.9926 16.7352 18.364 18.3639M5.63604 5.63598L18.364 18.3639" stroke="#ff0000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> </g> <defs> <clipPath id="clip0_429_11057"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg>

                    <h1 class="text-lg font-semibold text-red-500 opacity-50">This book is currently unavailable!</h1>
                    </div>

                    @else

                    <div class="flex items-center mt-2 mb-2">
                        <svg class="h-6 opacity-50 mr-1 " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#44ff00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

                    <h1 class="text-lg font-semibold text-green-500 opacity-50">This book is available.</h1>
                    </div>
                    @endif
                    
                    <h2 class="text-3xl font-bold text-blue-500 sm:text-4xl">{{$book->title}}</h2>
                    <div class="flex items-center mt-2">
                        <svg class="h-5 mr-2 opacity-50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 6C3 4.34315 4.34315 3 6 3H7C8.65685 3 10 4.34315 10 6V7C10 8.65685 8.65685 10 7 10H6C4.34315 10 3 8.65685 3 7V6Z" stroke="#ffffff" stroke-width="2"></path> <path d="M14 6C14 4.34315 15.3431 3 17 3H18C19.6569 3 21 4.34315 21 6V7C21 8.65685 19.6569 10 18 10H17C15.3431 10 14 8.65685 14 7V6Z" stroke="#ffffff" stroke-width="2"></path> <path d="M14 17C14 15.3431 15.3431 14 17 14H18C19.6569 14 21 15.3431 21 17V18C21 19.6569 19.6569 21 18 21H17C15.3431 21 14 19.6569 14 18V17Z" stroke="#ffffff" stroke-width="2"></path> <path d="M3 17C3 15.3431 4.34315 14 6 14H7C8.65685 14 10 15.3431 10 17V18C10 19.6569 8.65685 21 7 21H6C4.34315 21 3 19.6569 3 18V17Z" stroke="#ffffff" stroke-width="2"></path> </g></svg>
                    <h1 class="text-lg">{{$book->category}}</h1>
                </div>

                <div class="flex items-center mt-2">
                    <svg class="h-5 mr-2  opacity-50" fill="#ffffff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" transform="rotate(0)" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M486.881,8.551h-59.858c-4.428,0-8.017,3.588-8.017,8.017c0,4.428,3.588,8.017,8.017,8.017h59.858 c5.01,0,9.086,4.076,9.086,9.086v128.802h-35.273V59.324c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017 v103.148h-9.62V59.324c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017v103.148h-9.62V59.324 c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017v103.148h-9.62V59.324c0-4.428-3.588-8.017-8.017-8.017 c-4.428,0-8.017,3.588-8.017,8.017v103.148h-9.62V59.324c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017 v103.148h-26.722V59.324c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017v103.148h-9.62V59.324 c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017v103.148h-9.62V59.324c0-4.428-3.588-8.017-8.017-8.017 c-4.428,0-8.017,3.588-8.017,8.017v103.148h-9.62V59.324c0-4.428-3.588-8.017-8.017-8.017s-8.017,3.588-8.017,8.017v103.148h-9.62 V59.324c0-4.428-3.588-8.017-8.017-8.017s-8.017,3.588-8.017,8.017v103.148h-9.62V59.324c0-4.428-3.588-8.017-8.017-8.017 s-8.017,3.588-8.017,8.017v103.148h-26.722V59.324c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017v103.148 h-9.62V59.324c0-4.428-3.588-8.017-8.017-8.017s-8.017,3.588-8.017,8.017v103.148h-9.62V59.324c0-4.428-3.588-8.017-8.017-8.017 c-4.428,0-8.017,3.588-8.017,8.017v103.148h-9.62V59.324c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017 v103.148H16.033V33.67c0-5.01,4.076-9.086,9.086-9.086h367.699c4.428,0,8.017-3.588,8.017-8.017c0-4.428-3.588-8.017-8.017-8.017 H25.119C11.268,8.551,0,19.819,0,33.67v324.944c0,4.428,3.588,8.017,8.017,8.017c4.428,0,8.017-3.588,8.017-8.017V212.71h35.273 v239.967c0,4.428,3.588,8.017,8.017,8.017c4.428,0,8.017-3.588,8.017-8.017V212.71h9.62v171.557c0,4.428,3.588,8.017,8.017,8.017 c4.428,0,8.017-3.588,8.017-8.017V212.71h9.62v171.557c0,4.428,3.588,8.017,8.017,8.017s8.017-3.588,8.017-8.017V212.71h9.62 v171.557c0,4.428,3.588,8.017,8.017,8.017s8.017-3.588,8.017-8.017V212.71h26.722v171.557c0,4.428,3.588,8.017,8.017,8.017 s8.017-3.588,8.017-8.017V212.71h9.62v171.557c0,4.428,3.588,8.017,8.017,8.017s8.017-3.588,8.017-8.017V212.71h9.62v171.557 c0,4.428,3.588,8.017,8.017,8.017s8.017-3.588,8.017-8.017V212.71h9.62v171.557c0,4.428,3.588,8.017,8.017,8.017 c4.428,0,8.017-3.588,8.017-8.017V212.71h9.62v171.557c0,4.428,3.588,8.017,8.017,8.017c4.428,0,8.017-3.588,8.017-8.017V212.71 h9.62v171.557c0,4.428,3.588,8.017,8.017,8.017c4.428,0,8.017-3.588,8.017-8.017V212.71h26.722v171.557 c0,4.428,3.588,8.017,8.017,8.017c4.428,0,8.017-3.588,8.017-8.017V212.71h9.62v171.557c0,4.428,3.588,8.017,8.017,8.017 c4.428,0,8.017-3.588,8.017-8.017V212.71h9.62v171.557c0,4.428,3.588,8.017,8.017,8.017c4.428,0,8.017-3.588,8.017-8.017V212.71 h9.62v171.557c0,4.428,3.588,8.017,8.017,8.017c4.428,0,8.017-3.588,8.017-8.017V212.71h9.62v239.967 c0,4.428,3.588,8.017,8.017,8.017c4.428,0,8.017-3.588,8.017-8.017V212.71h35.273v265.62c0,5.01-4.076,9.086-9.086,9.086H25.119 c-5.01,0-9.086-4.076-9.086-9.086v-85.511c0-4.428-3.588-8.017-8.017-8.017c-4.428,0-8.017,3.588-8.017,8.017v85.511 c0,13.851,11.268,25.119,25.119,25.119h461.762c13.851,0,25.119-11.268,25.119-25.119V33.67 C512,19.819,500.732,8.551,486.881,8.551z M495.967,196.676H16.033v-18.171h479.933V196.676z"></path> </g> </g> <g> <g> <path d="M119.182,401.904H84.977c-4.428,0-8.017,3.588-8.017,8.017v42.756c0,4.428,3.588,8.017,8.017,8.017h34.205 c4.428,0,8.017-3.588,8.017-8.017v-42.756C127.198,405.492,123.61,401.904,119.182,401.904z M111.165,444.66H92.994v-26.722 h18.171V444.66z"></path> </g> </g> <g> <g> <path d="M179.04,401.904h-34.205c-4.428,0-8.017,3.588-8.017,8.017v42.756c0,4.428,3.588,8.017,8.017,8.017h34.205 c4.428,0,8.017-3.588,8.017-8.017v-42.756C187.056,405.492,183.468,401.904,179.04,401.904z M171.023,444.66h-18.171v-26.722 h18.171V444.66z"></path> </g> </g> <g> <g> <path d="M221.795,401.904c-4.428,0-8.017,3.588-8.017,8.017v42.756c0,4.428,3.588,8.017,8.017,8.017s8.017-3.588,8.017-8.017 v-42.756C229.812,405.492,226.224,401.904,221.795,401.904z"></path> </g> </g> <g> <g> <path d="M290.205,401.904H256c-4.428,0-8.017,3.588-8.017,8.017v42.756c0,4.428,3.588,8.017,8.017,8.017h34.205 c4.428,0,8.017-3.588,8.017-8.017v-42.756C298.221,405.492,294.633,401.904,290.205,401.904z M282.188,444.66h-18.171v-26.722 h18.171V444.66z"></path> </g> </g> <g> <g> <path d="M324.409,401.904c-4.428,0-8.017,3.588-8.017,8.017v42.756c0,4.428,3.588,8.017,8.017,8.017 c4.428,0,8.017-3.588,8.017-8.017v-42.756C332.426,405.492,328.838,401.904,324.409,401.904z"></path> </g> </g> <g> <g> <path d="M358.614,401.904c-4.428,0-8.017,3.588-8.017,8.017v42.756c0,4.428,3.588,8.017,8.017,8.017 c4.428,0,8.017-3.588,8.017-8.017v-42.756C366.63,405.492,363.042,401.904,358.614,401.904z"></path> </g> </g> <g> <g> <path d="M427.023,401.904h-34.205c-4.428,0-8.017,3.588-8.017,8.017v42.756c0,4.428,3.588,8.017,8.017,8.017h34.205 c4.428,0,8.017-3.588,8.017-8.017v-42.756C435.04,405.492,431.451,401.904,427.023,401.904z M419.006,444.66h-18.171v-26.722 h18.171V444.66z"></path> </g> </g> </g></svg>
                <h1 class="text-lg">{{$book->isbn}}</h1>
            </div>
            

            <div class="flex items-center mt-2">
                <svg class="h-5 mr-2  opacity-50" fill="#ffffff"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 964.07 964.07" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M850.662,877.56c-0.77,0.137-4.372,0.782-10.226,1.831c-230.868,41.379-273.337,48.484-278.103,49.037 c-11.37,1.319-19.864,0.651-25.976-2.042c-3.818-1.682-5.886-3.724-6.438-4.623c0.268-1.597,2.299-5.405,3.539-7.73 c1.207-2.263,2.574-4.826,3.772-7.558c7.945-18.13,2.386-36.521-14.51-47.999c-12.599-8.557-29.304-12.03-49.666-10.325 c-12.155,1.019-225.218,36.738-342.253,56.437l-57.445,45.175c133.968-22.612,389.193-65.433,402.622-66.735 c11.996-1.007,21.355,0.517,27.074,4.4c3.321,2.257,2.994,3.003,2.12,4.997c-0.656,1.497-1.599,3.264-2.596,5.135 c-3.835,7.189-9.087,17.034-7.348,29.229c1.907,13.374,11.753,24.901,27.014,31.626c8.58,3.78,18.427,5.654,29.846,5.654 c4.508,0,9.261-0.292,14.276-0.874c9.183-1.065,103.471-17.67,280.244-49.354c5.821-1.043,9.403-1.686,10.169-1.821 c9.516-1.688,15.861-10.772,14.172-20.289S860.183,875.87,850.662,877.56z"></path> <path d="M231.14,707.501L82.479,863.005c-16.373,17.127-27.906,38.294-33.419,61.338l211.087-166.001 c66.081,29.303,118.866,38.637,159.32,38.637c71.073,0,104.065-28.826,104.065-28.826c-66.164-34.43-75.592-98.686-75.592-98.686 c50.675,21.424,156.235,46.678,156.235,46.678c140.186-93.563,213.45-296.138,213.45-296.138 c-14.515,3.99-28.395,5.652-41.475,5.652c-65.795,0-111-42.13-111-42.13l183.144-39.885C909.186,218.71,915.01,0,915.01,0 L358.176,495.258C295.116,551.344,250.776,625.424,231.14,707.501z"></path> </g> </g></svg>
                <h1 class="text-lg">{{$book->author}}</h1>
            </div>
                    <p class="mt-4 text-gray-600 text-lg">{{$book->description}}</p>
                    <div class="mt-8">
                       
                    </div>
                </div>
                
            </div>
        </div>
    </section>
  </div>
  <label class="modal-backdrop" for="my_modal_view_{{$book->id}}">Close</label>
</div>
<!-- VIEW BOOK MODAL !-->

<!-- DELETE BOOK MODAL    !-->
<input type="checkbox" id="my_modal_delete_{{$book->id}}" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900">
    <h3 class="text-2xl text-red-500 font-bold ">Warning!</h3>
    <p class="pt-4">You are about to delete a book.</p>
    <p class="">Once deleted, the data cannot be recovered.</p>
    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
    
      @csrf
   @method('DELETE')
  <button type="submit" class="btn mt-5 bg-red-500  flex justify-end">Delete</button>
  </form>
  </div>
  <label class="modal-backdrop" for="my_modal_delete_{{$book->id}}">Close</label>
</div>
<!-- DELETE BOOK MODAL    !-->


<!-- EDIT BOOK MODAL    !-->
<input type="checkbox" id="my_modal_edit_{{$book->id}}" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900">
    <form action="{{route('books.update', $book->id)}}" method="POST" class="bg-gray-900 p-5 rounded-lg min-w-full">
      @csrf
      @method('PUT')
        <h1 class="text-center text-2xl mb-6 text-blue-500 font-bold font-sans">Edit Book</h1>
        <div>
            <label class="text-gray-500 font-semibold block  text-md" for="name">Title</label>
            <input  value="{{ $book->title}}" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="title" id="title"  />
  </div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="name">Author</label>
    <input value="{{ $book->author}}" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="author" id="author"  />
</div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="student_id">Book Code</label>
    <input value="{{ $book->isbn}}" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="isbn" id="isbn"  />
</div>

<div>
    <label class="text-gray-500 font-semibold block text-md" for="options">Category</label>
    <select value="{{ $book->category}}" class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" name="category" id="category">
        <option value="Science">Science</option>
        <option value="Arts">Arts</option>
        <option value="Novel">Novel</option>
    </select>
</div>

<div>
  <label class="text-gray-500 font-semibold block  text-md" for="isbn">Description</label>
  <textarea  class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="description" id="description" >{{$book->description}}</textarea>

</div>
  
                        <button type="submit" class="w-full mt-6 bg-blue-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Save</button>
    </form>
  </div>
  <label class="modal-backdrop" for="my_modal_edit_{{$book->id}}">Close</label>
</div>
<!-- EDIT BOOK MODAL    !-->


@endforeach


<!-- ADD BOOK MODAL !-->
<input type="checkbox" id="my_modal_add" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box bg-gray-900">
    <form method="POST" action="{{route('books.store')}}" class="bg-gray-900 p-5 rounded-lg min-w-full">
      @csrf
        <h1 class="text-center text-2xl mb-6 text-blue-500 font-bold font-sans">Add a Book</h1>
        <div>
            <label class="text-gray-500 font-semibold block  text-md" for="name">Title</label>
            <input class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="title" id="title"  />
  </div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="name">Author</label>
    <input class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="author" id="author"  />
</div>

  <div>
    <label class="text-gray-500 font-semibold block  text-md" for="isbn">Book Code</label>
    <input class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="isbn" id="isbn"  />
</div>

<div>
    <label class="text-gray-500 font-semibold block text-md" for="category">Category</label>
    <select class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" name="category" id="category">
        <option value="Science">Science</option>
        <option value="Arts">Arts</option>
        <option value="Novel">Novel</option>
    </select>
</div>

<div>
  <label class="text-gray-500 font-semibold block  text-md" for="isbn">Description</label>
  <textarea class="w-full bg-gray-900 px-4 py-2 mb-4 rounded-lg focus:outline-none" type="text" name="description" id="description" ></textarea>

</div>
  
                        <button type="submit" class="w-full mt-6 bg-blue-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Save</button>
    </form>
  </div>
  <label class="modal-backdrop" for="my_modal_add">Close</label>
</div>
<!-- ADD BOOK MODAL !-->



<body>
    <x-app-layout>

      
        
        <div class="flex-1  sm:px-0">

          

          <div class="flex items-center justify-center  mt-10 px-20  w-f">
            <form action="{{route('books.search')}}" method="GET" class="flex items-center w-3/4 ">   
                <label for="voice-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none ">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    
                    <input type="text" name="query"  class=" bg-gray-50 rounded-lg border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for books (Code, Title...)" >
                    
                </div>
                <button type="submit" class="inline-flex items-center transition duration-200 ease-in-out  rounded-lg py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="mr-2 -ml-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>Search
                </button>
           
            </form>


            <form class="flex ml-10 " action="{{ route('books.category') }}" method="GET">
              <select class="w-1/2 bg-gray-800 rounded-lg border-none  focus:outline-none" name="category" id="category">
                <option value="Arts">Art</option>
                <option value="Science">Science</option>
                <option value="Novel">Novels</option>
              </select>
              <button type="submit" class="btn ml-2 bg-blue-600 text-white">Filter</button>
          </form>

            

          </div>


            

              
            <div class="flex justify-between items-center">

              

                
            
            
            </div>
            <div class="mb-10  sm:mb-0  px-20 pb-10 mt-10 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <label for="my_modal_add" class="">
              <div class="group bg-gray-900/30 py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md hover:bg-gray-900/40 hover:smooth-hover">
                <div class="bg-gray-800/70 hover:bg-blue-500 transition duration-200 ease-in-out bg text-white/50 group-hover:text-white group-hover:smooth-hover flex w-20 h-20 rounded-full items-center justify-center" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                      </svg></div>
                 
                
                <h1 class="text-white/50 text-2xl group-hover:text-white group-hover:smooth-hover transition duration-300 ease-in-out text-center" href="#">Add a Book</h1>
              </div>
            </label>


            @foreach($books as $book)
              <!-- BOOK CARD !-->
              <label for="my_modal_view_{{$book->id}}" class="">
                
              <div class="relative group bg-gray-800 py-10 sm:py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-lg hover:bg-gray-950  transition duration-400 ease-in-out">
              
                <svg viewBox="0 0 24 24" class="h-24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 19V6.2C4 5.0799 4 4.51984 4.21799 4.09202C4.40973 3.71569 4.71569 3.40973 5.09202 3.21799C5.51984 3 6.0799 3 7.2 3H16.8C17.9201 3 18.4802 3 18.908 3.21799C19.2843 3.40973 19.5903 3.71569 19.782 4.09202C20 4.51984 20 5.0799 20 6.2V17H6C4.89543 17 4 17.8954 4 19ZM4 19C4 20.1046 4.89543 21 6 21H20M9 7H15M9 11H15M19 17V21" stroke="#0033ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
          
                <div class="opacity-70">
                    <label for="my_modal_delete_{{$book->id}}" class="btn mx-1  btn-sm btn-circle bg-red-500 hover:bg-red-800 border-none">
                        <svg class="h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                      </label>
                      <label for="my_modal_edit_{{$book->id}}" class="btn mx-1 btn-sm btn-circle bg-yellow-600 hover:bg-yellow-700 border-none">
                        <svg class="h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                      </label>
                    </div>
                <h4 class="text-white text-2xl font-bold capitalize text-center">{{$book->title}}</h4>
                <p class="text-white/50">{{$book->category}}</p>
                
                @if ($book->isLoaned())
                <svg class="h-10 opacity-50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_11057)"> <path d="M5.63604 5.63598C4.00736 7.26466 3 9.51466 3 11.9999C3 16.9705 7.02944 20.9999 12 20.9999C14.4853 20.9999 16.7353 19.9926 18.364 18.3639M5.63604 5.63598C7.26472 4.0073 9.51472 2.99994 12 2.99994C16.9706 2.99994 21 7.02938 21 11.9999C21 14.4852 19.9926 16.7352 18.364 18.3639M5.63604 5.63598L18.364 18.3639" stroke="#ff0000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> </g> <defs> <clipPath id="clip0_429_11057"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg> 
               @else
                <svg class="h-10 opacity-50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#44ff00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
              @endif
              </div>
              
            </label>
            
                  <!-- BOOK CARD !-->
                  @endforeach

                    

                  

                  

              
             
            </div>
          </div>
        </div>
      </div>

    </x-app-layout>
    @include('notify::components.notify')
    @notifyJs
    
</body>
</html>