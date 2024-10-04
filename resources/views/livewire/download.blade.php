<div class="min-h-screen mt-12">
    <div class="container flex justify-center px-4 mx-auto">
        <div class="grid w-full max-w-screen-lg grid-cols-12 gap-4">
            <div class="col-span-1"></div>
            <div class="col-span-12 p-8 bg-white lg:col-span-10">
                <h2 class="mb-1 text-2xl font-semibold text-center text-red-600 ">
                    {{ 'Lincoln Student Identity Card Generation Portal' }}</h2>
                <div class="flex flex-col items-center justify-center">
                    <p class="w-2/3 mt-1 text-xs text-center text-slate-700">Download a copy of your identity card for
                        printing</p>
                </div>
                <div class="flex flex-col justify-center gap-4 my-6 lg:my-3 md:flex-row">
                    <form action="{{ route('generate.pdf') }}">
                        <x-button class="bg-green-500">
                            <span>Download PDF</span>
                        </x-button>
                    </form>
                    <a href="{{ route('front') }}"
                        class="text-white flex justify-center bg-red-500 items-center focus:ring-2 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Download
                        Image(Front)</a>
                    <a href="{{ route('back') }}"
                        class="text-white flex justify-center bg-red-500 items-center focus:ring-2 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Download
                        Image(Back)</a>
                    <a href="{{ route('preview') }}"
                        class="text-white flex justify-center bg-black items-center focus:ring-2 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Preview</a>
                </div>
            </div>
        </div>
    </div>
</div>
