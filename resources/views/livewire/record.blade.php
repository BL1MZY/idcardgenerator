<div class="min-h-screen mt-12">

    <div class="container flex justify-center px-4 mx-auto">
        <div class="grid w-full max-w-screen-lg grid-cols-12 gap-4">
            <div class="col-span-1"></div>
            <div class="col-span-12 p-8 bg-white lg:col-span-10">
                    <h2
                        class="mb-1 text-2xl font-semibold @if ($user->status == 'Approved') text-green-600 @else text-red-500 @endif lg:text-center">
                        {{ 'This application is ' . $user->status }}</h2>
                    <div class="flex items-center justify-center gap-4">
                            <input type="text" value="{{ $user->id }}" hidden>
                          
                            <div class="flex gap-3 mt-4">
                                @if($user->status !="Approved")
                                 <x-button class="bg-green-600  @if($user->status=='Approved') disabled @endif disabled:bg-green-100" wire:loading.attr="disabled" wire:click='approve'>
                                    <span wire:loading.class="hidden" wire:target="create">Approve Application</span>
                                    <span class="self-center me-2" wire:loading wire:target="create">Approving</span>
                                    <span class="self-center" wire:loading wire:target="approve"> <x-filament::loading-indicator
                                            class="w-5 h-5 me-2" /> </span>
                                </x-button>
                                @endif

                                @if($user->status !="Rejected")
                                 <x-button class="bg-red-600" wire:loading.attr="disabled" wire:click='reject'>
                                    <span wire:loading.class="hidden" wire:target="create">Reject Application</span>
                                    <span class="self-center me-2" wire:loading wire:target="create">Processing</span>
                                    <span class="self-center" wire:loading wire:target="reject"> <x-filament::loading-indicator
                                            class="w-5 h-5 me-2" /> </span>
                                </x-button>
                                @endif
                            </div>
                       
                    </div>
            
                <div class="flex flex-col items-center justify-center py-6">
                    <div class="id-card mb-4 w-full h-auto md:w-[450px] md:h-[286px] " style="background-image: url({{ Auth::user()->status == 'Approved' ? asset('photo/lincoln.png') : asset('photo/notapproved.png') }});background-size:cover ">
                  
                        <div class="flex items-center justify-between w-full px-4 py-1">
                            <img src="{{ asset('photo/images.jpg') }}" width="140px" alt="">
                            <p class="self-center red">www.lincoln.edu.my</p>
                        </div>
                        <div class="id-card-header">
                            <h1 class="m-0">{{ $user->name }}</h1>
                        </div>

                        <div class="id-card-body">
                            <div class="id-card-photo">
                                <img src="{{ $user->photo }}" alt="{{ $user->name }}" class="border">
                            </div>
                            <div class="id-card-info">
                                <p>Student ID: <span class="ms-2">{{ $user->student_id }}</span></p>
                                <p>Department: <span class="ms-2">{{ $user->department }}</span></p>
                                <p>Course: <span class="ms-2">{{ $user->course }}</span></p>
                                <p>Nationality:<span class="ms-2"> {{ $user->nationality }}</span></p>
                            </div>
                        </div>
                        <div class="id-card-footer ">
                            <p>Expiry Date: {{ now()->format('M d') . ' ' . now()->format('Y') + 4 }}</p>
                        </div>
                    </div>
                    
                    <div class="id-card w-full  md:w-[450px] md:h-[286px] " style="background-image: url({{ Auth::user()->status == 'Approved' ? asset('photo/lincoln.png') : asset('photo/notapproved.png') }});background-size:cover ">
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
                                <p class="text-center" style="font-weight: 400">Phone: {{ $user->phone }}</p>
                                <div class="flex justify-center" style="margin-top: 4px">
                                    {{  QrCode::size(50)->generate(asset(Auth::user()->id)); }}
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
