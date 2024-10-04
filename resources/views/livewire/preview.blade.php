<div class="min-h-screen mt-12">

    <div class="container flex justify-center px-4 mx-auto">
        <div class="grid w-full max-w-screen-lg grid-cols-12 gap-4">



            <div class="col-span-1"></div>
            <div class="col-span-12 p-8 bg-white lg:col-span-10">
                <button class="px-2 py-1 text-white bg-black rounded-sm cursor-pointer" onclick="history.back()">Back</button>
             
                <div class="flex flex-col items-center justify-center py-6">
                    <div class="id-card mb-4 w-full h-auto md:w-[450px] md:h-[286px] " style="background-image: url({{ Auth::user()->status == 'Approved' ? asset('photo/lincoln.png'): asset('photo/notapproved.png')  }}); background-size:cover;">
                  
                        <div class="flex items-center justify-between w-full px-4 py-1">
                            <img src="{{ asset('photo/images.jpg') }}" width="140px" alt="">
                            <p class="self-center red">www.lincoln.edu.my</p>
                        </div>
                        <div class="id-card-header">
                            <h1 class="m-0">{{ Auth::user()->name }}</h1>
                        </div>

                        <div class="id-card-body">
                            <div class="id-card-photo">
                                <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}" class="border">
                            </div>
                            <div class="id-card-info">
                                <p>Student ID: <span class="ms-2">{{ Auth::user()->student_id }}</span></p>
                                <p>Department: <span class="ms-2">{{ Auth::user()->department }}</span></p>
                                <p>Course: <span class="ms-2">{{ Auth::user()->course }}</span></p>
                                <p>Nationality:<span class="ms-2"> {{ Auth::user()->nationality }}</span></p>
                            </div>
                        </div>
                        <div class="id-card-footer ">
                            <p>Expiry Date: {{ now()->format('M d') . ' ' . now()->format('Y') + 4 }}</p>
                        </div>
                    </div>
                    
                    <div class="id-card mb-4 w-full h-auto md:w-[450px] md:h-[286px] " style="background-image: url({{ Auth::user()->status == 'Approved' ? asset('photo/lincoln.png'): asset('photo/notapproved.png')  }}); background-size:cover;">
                        <div class="flex items-center justify-between w-full px-4 py-1">
                            <img src="{{ asset('photo/images.jpg') }}" width="140px" alt="">
                            <p class="self-center red">www.lincoln.edu.my</p>
                        </div>
                        <div class="id-card-header">
                            <h1 class="m-0">{{ 'Disclaimer' }}</h1>
                        </div>
                        <div class="id-card-body">
                            <div class="id-card-info">
                                <p class="text-center" style="font-weight: 400">If found, please return this ID card
                                    to</p>
                                <p class="text-center" style="font-weight: 400">123 University Ave, City, State, Zip
                                    Code</p>
                                <p class="text-center" style="font-weight: 400">Phone: {{ Auth::user()->phone }}</p>
                                <div class="flex justify-center" style="margin-top: 4px">
                                    {{-- <img
                                        src="{{ asset('photo/qrcode.png') }}" class="text-center" height="50px"
                                        width="50px" alt="Student Photo"> --}}
                                        {{ QrCode::size(50)->generate(asset(Auth::user()->id)) }}
                                    </div>
                            </div>
                        </div>
                        <div class="id-card-footer ">
                            <p>
                            <p class="text-center">Email: support@lincoln.edu.my</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1"></div>
        </div>
    </div>
</div>
