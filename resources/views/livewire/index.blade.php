<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="py-12 bg-red-50" style="background-image: url({{ asset('photo/lincoln.png')  }}); background-size:cover;">
        <div class="z-0 py-12 text-center h-42">
            <div class="flex justify-center font-semibold text-red-500">
                <div class="flex justify-center px-4 py-2 bg-white rounded-full shadow-sm ">
                    <div class="self-center w-4 h-4 bg-red-500 rounded-full me-2 animate-pulse"></div>
                   ID Generator
                </div>
            </div>

            <h1 class="mt-4 text-5xl font-bold ">Online ID Card Generator</h1>
            <h1 class="my-2 text-5xl font-bold ">for lincoln student</h1>
            <p class="mb-6 text-slate-500">Providing an easier and faster access to generate your id card</p>
            {{-- <a href="{{ route('my-elections') }}" class="px-6 py-2 mt-6 text-white bg-green-500 rounded-md">Vote now</a> --}}
        </div>
    </div>

    <div class="w-full p-8 ">
        <h1 class="mb-4 text-lg font-semibold text-center uppercase">How to Apply for Id Card</h1>
        <div class="container mx-auto text-center ">

            <div class="grid-cols-12 gap-4 lg:grid ">
                <div class="col-span-12 px-6 py-4 mt-4 bg-white md:col-span-6">
                    <div class="flex flex-col">
                        <div class="flex">
                            <button
                                class="w-8 h-8 font-semibold text-center text-white bg-red-500 rounded-full">1</button>
                            <h1 class="self-center font-bold text-red-500 uppercase ms-3">Identity Verification</h1>

                        </div>
                        <ul class="self-start text-left list-disc ml-11">
                            <li class="text-slate-500 text-md">you must be a student</li>
                            <li class="text-slate-500 text-md">Information must be registered on our system</li>
                            <li class="text-slate-500 text-md">Must have a valid student identification</li>
                          
                        </ul>
                    </div>


                </div>
                <div class="col-span-12 px-6 py-4 mt-4 bg-white md:col-span-6">

                    <div class="flex flex-col ">
                        <div class="flex">
                            <button
                                class="w-8 h-8 font-semibold text-center text-white bg-red-500 rounded-full">2</button>
                            <h1 class="self-center font-bold text-red-500 uppercase ms-3">ID card generation</h1>

                        </div>
                        <ul class="self-start text-left list-disc ml-11">
                            <li class="text-slate-500">Fill in your school details</li>
                            <li class="text-slate-500">Submit your application</li>

                        </ul>
                    </div>



                </div>
               
             


            </div>
        </div>
    </div>
    <div class="p-12 text-center text-white bg-red-700">
        <h1>ID Card Generator {{ now()->format('Y') }}</h1>
    </div>
</div>
