<div class="min-h-screen mt-3">
    <div class="flex flex-col items-center justify-center my-6">
        @if (!empty(Auth::user()->status))
            <h2
                class=" text-2xl font-semibold @if (Auth::user()->status == 'Approved') text-green-600 @else text-red-500 @endif lg:text-center">
                {{ 'Your application is ' . Auth::user()->status }}</h2>
        @endif

        @if (!empty(Auth::user()->reason))
            <p class="text-center lg:w-1/2">{{ Auth::user()->reason }}</p>
        @endif
    </div>
    <div class="container flex justify-center px-4 mx-auto">

        <div class="grid w-full max-w-screen-lg grid-cols-12 gap-4">

            @if (Auth::user()->status == 'Rejected' || empty(Auth::user()->status))
                <div class="col-span-1"></div>
                <div class="col-span-12 p-8 bg-white lg:col-span-10">

                    <h2 class="mb-1 text-2xl font-semibold text-center text-red-600">
                        {{ 'Lincoln Student Identity Card Generation Portal' }}</h2>

                    <div class="flex flex-col items-center justify-center">
                        <p class="w-2/3 text-xs text-center text-slate-700">Fill the form below carefully to generate
                            your ID
                            card, Make sure you are not wearing eye glasses to avoid rejection.A sample of the id card
                            will
                            be generated below</p>
                    </div>
                    <form wire:submit="create" enctype="multipart/form-data">
                        <div class="grid grid-cols-12 gap-4 mt-6">
                            <x-input id="pin" label="Student ID" name="student_id" wire:model.live="student_id"
                                placeholder="E.g LNC/2930/APR/23" :required='true' />
                            <x-input id="photo" type="file" class="py-[0.45rem]" label="Profile Photo"
                                name="photo" wire:model="photo" placeholder="Doe" onchange="previewImage(event)"
                                accept="image/*" capture="camera" :required='true' />
                            <x-input id="name" label="Full name" name="name" wire:model.live="name"
                                placeholder="E.g Halima Mainoma Kabir" :required='true' />
                            <x-input id="department" label="Department" name="department" wire:model.live="department"
                                placeholder="E.g Computer Science" :required='true' />
                            <x-input id="course" label="Course" name="course" wire:model.live="course"
                                placeholder="E.g Software Engineer" :required='true' />
                            <x-input id="phone" label="Phone number" name="phone" wire:model="phone"
                                placeholder="081010123457" :required='true' />

                            <x-input id="email" type="email" label="Email" name="email" wire:model.live="email"
                                placeholder="example@gmail.com" :required='true' readonly/>
                            <x-input id="nationality" type="text" label="Nationality" name="nationality"
                                wire:model.live="nationality" placeholder="E.g Nigerian" :required='true' />

                            <x-textarea id="address" label="Home Address" name="address" wire:model="address"
                                placeholder="Home Address" rows="3" :required='true' />

                        </div>

                        <div class="my-6 lg:my-3">
                            <x-button wire:loading.attr="disabled" class="bg-red-600">
                                <span wire:loading.class="hidden" wire:target="create">Submit</span>
                                <span class="self-center me-2" wire:loading wire:target="create"> Submitting</span>
                                <span class="self-center" wire:loading wire:target="create">
                                    <x-filament::loading-indicator class="w-5 h-5 me-2" /> </span>
                            </x-button>
                        </div>
                    </form>
                </div>

                <div class="col-span-1"></div>
            @endif
            <div class="col-span-1"></div>
            <div class="col-span-12 p-8 bg-white lg:col-span-10">
                @if (Auth::user()->photo && Auth::user()->student_id && Auth::user()->department)
                    <div class="flex flex-col items-center justify-center">
                        <p class="w-2/3 text-xs text-center text-slate-700">Once your submission has been approved you
                            will be able to download and print your identity card</p>
                    </div>
                @endif
                <div class="flex flex-col items-center justify-center py-6">
                    <div class="id-card mb-4 w-full h-auto md:w-[450px] md:h-[286px] "
                        style="background-image: url({{ Auth::user()->status == 'Approved' ? asset('photo/lincoln.png') : asset('photo/notapproved.png') }});background-size:cover">

                        <div class="flex items-center justify-between w-full px-4 py-1">
                            <img src="{{ asset('photo/images.jpg') }}" width="140px" alt="">
                            <p class="self-center red">www.lincoln.edu.my</p>
                        </div>
                        <div class="id-card-header">
                            <h1 class="m-0">{{ $name }}</h1>
                        </div>

                        <div class="id-card-body">
                            <div class="id-card-photo">
                                @if ($photo && !empty($photo))
                                    <img src="{{ $photo->temporaryUrl() }}" alt="{{ $name }}" class="border">
                                @elseif (Auth::user()->photo)
                                    <img src="{{ Auth::user()->photo }}" alt="{{ $name }}" class="border">
                                @else
                                    <img src="{{ asset('photo/noimage.jpg') }}" alt="Student Photo">
                                @endif
                            </div>
                            <div class="id-card-info">
                                <p>Student ID: <span class="ms-2">{{ $student_id }}</span></p>
                                <p>Department: <span class="ms-2">{{ $department }}</span></p>
                                <p>Course: <span class="ms-2">{{ $course }}</span></p>
                                <p>Nationality:<span class="ms-2"> {{ $nationality }}</span></p>
                            </div>
                        </div>
                        <div class="id-card-footer ">

                            <p>Expiry Date: {{ now()->format('M d') . ' ' . now()->format('Y') + 4 }}</p>
                        </div>
                    </div>
                    <div class="id-card mb-4 w-full h-auto md:w-[450px] md:h-[286px] "
                        style="background-image: url({{ Auth::user()->status == 'Approved' ? asset('photo/lincoln.png') : asset('photo/notapproved.png') }});background-size:cover">
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
                                <p class="text-center" style="font-weight: 400">Phone: {{ $phone }}</p>
                                <div class="flex justify-center" style="margin-top: 4px">
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
