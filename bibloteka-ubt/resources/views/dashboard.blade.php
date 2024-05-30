<x-app-layout>

       <h1 class="mx-10 mt-10 mb-0 text-3xl font-bold text-white">Welcome back, <span class="text-blue-500 font-extrabold">{{$username}}</span> </h1>


 
    <div class="">
        <div class=" ">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 bg-gray-900">
                    
                    <div id="content" class="bg-gray-800 col-span-9 rounded-lg p-6">
                        <div id="24h">
                            <h1 class="font-bold py-4 uppercase">Student Check-In</h1>

                            <form method="POST" action="{{ route('students.check-in') }}" >
                                @csrf
                            <div class="flex">
                                
                            <input type="text" name="student_id" placeholder="Enter student ID:" class="input input-bordered bg-gray-900 input-info w-full" />
                            <button type="submit" class="btn bg-gray-700 border-none ml-2 ">
                                <div class="flex items-center">
                                    <svg class="h-8 mr-1 text-white"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 7V8.2C20 9.88016 20 10.7202 19.673 11.362C19.3854 11.9265 18.9265 12.3854 18.362 12.673C17.7202 13 16.8802 13 15.2 13H4M4 13L8 9M4 13L8 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                Check In/Out
                            </div></button>
                        </div>
                    </form>
                            <h1 class="font-bold py-4 uppercase">Last 24h Statistics</h1>
                            <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div class="bg-gray-900 to-white/5 p-6 rounded-lg">
                                    <div class="flex flex-row space-x-4 items-center">
                                        <div id="stats-1">
                                            <svg class="h-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 7V8.2C20 9.88016 20 10.7202 19.673 11.362C19.3854 11.9265 18.9265 12.3854 18.362 12.673C17.7202 13 16.8802 13 15.2 13H4M4 13L8 9M4 13L8 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                        </div>
                                        <div>
                                            <p class="text-indigo-300 text-sm font-medium uppercase leading-4">Check-ins</p>
                                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                                <span class="text-4xl ">{{$checkInsCount}}</span>
                                          
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-900  p-6 rounded-lg">
                                    <div class="flex flex-row space-x-4 items-center">
                                        <div id="stats-1">
                                            <svg class="h-10" fill="#ffffff" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M229.75146,196.61035l-8.28173-30.9082-.00049-.00195-.00049-.00184L196.62256,72.97217v-.00086l-8.28223-30.90979a12.00916,12.00916,0,0,0-14.69678-8.48437l-30.90966,8.28222a11.99256,11.99256,0,0,0-3.61182,1.656A12.01237,12.01237,0,0,0,128,36H96a11.93662,11.93662,0,0,0-8,3.081A11.93662,11.93662,0,0,0,80,36H48A12.01343,12.01343,0,0,0,36,48V208a12.01343,12.01343,0,0,0,12,12H80a11.93662,11.93662,0,0,0,8-3.08105A11.93662,11.93662,0,0,0,96,220h32a12.01343,12.01343,0,0,0,12-12V78.02l2.53027,9.44373.00049.00109.00049.00122,24.84619,92.72706v.00122l.00049.00146,8.28174,30.90772a11.98984,11.98984,0,0,0,14.69678,8.48535l30.90966-8.28223a11.99918,11.99918,0,0,0,8.48535-14.69629ZM151.293,89.25781,189.93066,78.9054l22.77588,85.00207-38.63672,10.353ZM96,44h32a4.00427,4.00427,0,0,1,4,4V172H92V48A4.00427,4.00427,0,0,1,96,44ZM48,44H80a4.00427,4.00427,0,0,1,4,4V76H44V48A4.00427,4.00427,0,0,1,48,44ZM80,212H48a4.00427,4.00427,0,0,1-4-4V84H84V208A4.00427,4.00427,0,0,1,80,212Zm48,0H96a4.00427,4.00427,0,0,1-4-4V180h40v28A4.00427,4.00427,0,0,1,128,212ZM142.37549,51.4502a3.97587,3.97587,0,0,1,2.4292-1.86426l30.90918-8.28223a3.99814,3.99814,0,0,1,4.89892,2.82813l7.24756,27.04687L149.22266,81.53113l-7.24659-27.04578A3.9718,3.9718,0,0,1,142.37549,51.4502Zm79.249,150.26562a3.97594,3.97594,0,0,1-2.4292,1.86426l-30.90918,8.28222a4.00907,4.00907,0,0,1-4.89892-2.8291l-7.24707-27.04614,38.63672-10.353,7.24707,27.04663A3.97183,3.97183,0,0,1,221.62451,201.71582Z"></path> </g></svg>
                                        </div>
                                        <div>
                                            <p class="text-teal-300 text-sm font-medium uppercase leading-4">New Books</p>
                                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                                <span class="text-4xl">+ {{$newBooksCount}}</span>
                                             
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-900  p-6 rounded-lg">
                                    <div class="flex flex-row space-x-4 items-center">
                                        <div id="stats-1">
                                            <svg class="h-10"  version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#ffffff;} </style> <g> <path class="st0" d="M505.837,180.418L279.265,76.124c-7.349-3.385-15.177-5.093-23.265-5.093c-8.088,0-15.914,1.708-23.265,5.093 L6.163,180.418C2.418,182.149,0,185.922,0,190.045s2.418,7.896,6.163,9.627l226.572,104.294c7.349,3.385,15.177,5.101,23.265,5.101 c8.088,0,15.916-1.716,23.267-5.101l178.812-82.306v82.881c-7.096,0.8-12.63,6.84-12.63,14.138c0,6.359,4.208,11.864,10.206,13.618 l-12.092,79.791h55.676l-12.09-79.791c5.996-1.754,10.204-7.259,10.204-13.618c0-7.298-5.534-13.338-12.63-14.138v-95.148 l21.116-9.721c3.744-1.731,6.163-5.504,6.163-9.627S509.582,182.149,505.837,180.418z"></path> <path class="st0" d="M256,346.831c-11.246,0-22.143-2.391-32.386-7.104L112.793,288.71v101.638 c0,22.314,67.426,50.621,143.207,50.621c75.782,0,143.209-28.308,143.209-50.621V288.71l-110.827,51.017 C278.145,344.44,267.25,346.831,256,346.831z"></path> </g> </g></svg>
                                              
                                        </div>
                                        <div>
                                            <p class="text-blue-300 text-sm font-medium uppercase leading-4">Student Subscriptions</p>
                                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                                <span class="text-4xl">+ {{$newStudentsCount}}</span>
                                             
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="last-incomes">
                            <h1 class="font-bold py-4 uppercase">Last 24h Check-ins:</h1>
                            <div id="stats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                                @foreach ($checkInRecords as $record)
                                @if($record->action === 'checked in')
                                <div class="bg-gray-900  to-white/5 rounded-lg">
                              
                                        <div class="flex flex-row items-center">
                                            <div class="text-3xl p-4"><svg class="h-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 8V5C6 4.44772 6.44772 4 7 4H17C17.5523 4 18 4.44772 18 5V19C18 19.5523 17.5523 20 17 20H7C6.44772 20 6 19.5523 6 19V16M6 12H13M13 12L10.5 9.77778M13 12L10.5 14.2222" stroke="#002aff" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></div>
                                            <div class="p-2">
                                                <p class="text-xl text-blue-600 font-bold">Check-in</p>
                                                <p class="text-gray-500 font-medium">{{$record->student->name}}</p>
                                                <p class="text-gray-500 text-sm"> {{ \Carbon\Carbon::parse($record->timestamp)->format('Y-m-d H:i:s') }}</p>
                                            </div>
                                        </div>
                                </div>
                                @else

                                <div class="bg-gray-900  to-white/5 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="text-3xl p-4"><svg class="h-10" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill="none" fill-rule="evenodd" stroke="#ff0000" stroke-linecap="round" stroke-linejoin="round" transform="matrix(-1 0 0 1 18 3)"> <path d="m10.595 10.5 2.905-3-2.905-3"></path> <path d="m13.5 7.5h-9"></path> <path d="m10.5.5-8 .00224609c-1.1043501.00087167-1.9994384.89621131-2 2.00056153v9.99438478c.0005616 1.1043502.8956499 1.9996898 2 2.0005615l8 .0022461"></path> </g> </g></svg></div>
                                        <div class="p-2">
                                            <p class="text-xl text-red-500 font-bold">Check-out</p>
                                            <p class="text-gray-500 font-medium">{{$record->student->name}}
                                            </p>
                                            <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($record->timestamp)->format('Y-m-d H:i:s') }}</p>
                                        </div>
                                    </div>
                                   
                            </div>

                                @endif
                                @endforeach



                              
                             
                          
                      
                  
              
                            </div>
                        </div>
                        <div id="last-users">
                            <h1 class="font-bold py-4 uppercase">Last 24h users</h1>
                            <div class="">
                                <table class="w-full whitespace-nowrap">
                                    <thead class="bg-gray-900 ">
                                        <th class="text-left py-3 px-2 n rounded-l-lg">Name</th>
                                        <th class="text-left py-3 px-2">Age</th>
                                        <th class="text-left py-3 px-2">ID</th>
                                        <th class="text-left py-3 px-2">Date Registered</th>
                                        <th class="text-left py-3 px-2 rounded-r-lg"></th>
                                    </thead>
                                    @foreach($newStudents as $student)
                                    <tr class="border-b border-gray-700">
                                        <td class="py-3 px-2 font-bold">
                                            <div class="inline-flex space-x-3 items-center">
                                                <span><svg class="h-8"  viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M0.877014 7.49988C0.877014 3.84219 3.84216 0.877045 7.49985 0.877045C11.1575 0.877045 14.1227 3.84219 14.1227 7.49988C14.1227 11.1575 11.1575 14.1227 7.49985 14.1227C3.84216 14.1227 0.877014 11.1575 0.877014 7.49988ZM7.49985 1.82704C4.36683 1.82704 1.82701 4.36686 1.82701 7.49988C1.82701 8.97196 2.38774 10.3131 3.30727 11.3213C4.19074 9.94119 5.73818 9.02499 7.50023 9.02499C9.26206 9.02499 10.8093 9.94097 11.6929 11.3208C12.6121 10.3127 13.1727 8.97172 13.1727 7.49988C13.1727 4.36686 10.6328 1.82704 7.49985 1.82704ZM10.9818 11.9787C10.2839 10.7795 8.9857 9.97499 7.50023 9.97499C6.01458 9.97499 4.71624 10.7797 4.01845 11.9791C4.97952 12.7272 6.18765 13.1727 7.49985 13.1727C8.81227 13.1727 10.0206 12.727 10.9818 11.9787ZM5.14999 6.50487C5.14999 5.207 6.20212 4.15487 7.49999 4.15487C8.79786 4.15487 9.84999 5.207 9.84999 6.50487C9.84999 7.80274 8.79786 8.85487 7.49999 8.85487C6.20212 8.85487 5.14999 7.80274 5.14999 6.50487ZM7.49999 5.10487C6.72679 5.10487 6.09999 5.73167 6.09999 6.50487C6.09999 7.27807 6.72679 7.90487 7.49999 7.90487C8.27319 7.90487 8.89999 7.27807 8.89999 6.50487C8.89999 5.73167 8.27319 5.10487 7.49999 5.10487Z" fill="#ffffff"></path> </g></svg></span>
                                                <span>{{$student->name}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-2">{{$student->age}}</td>
                                        <td class="py-3 px-2">{{$student->id}}</td>
                                        <td class="py-3 px-2">{{ \Carbon\Carbon::parse($student->created_at)->format('Y-m-d H:i:s') }}</td>
                                        <td class="py-3 px-2">
                                         
                                        </td>
                                    </tr>
                                    @endforeach
                                    
            
                                    
                                </table>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
