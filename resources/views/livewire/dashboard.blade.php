<div class="min-h-screen mt-3">
    <div class="container flex justify-center mx-auto ">
        <div class="grid w-full max-w-screen-lg grid-cols-12 gap-4">
            <div class="col-span-12 lg:col-span-1"></div>
            <div class="col-span-12 p-8 lg:col-span-10">
                <h1 class="my-3 text-xl font-semibold text-red-500">Pending Request</h1>
                {{ $this->table }}
            </div>
        </div>
    </div>
</div>