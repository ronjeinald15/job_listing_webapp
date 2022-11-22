<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div class="flex flex-col items-center justify-center text-center">
            {{-- <img class="w-48 mr-6 mb-6" src="{{asset('/images/no-image.png')}}" alt="" /> --}}

            <h3 class="text-3xl font-bold mb-4">
                Employer's Profile
            </h3>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <div class="text-lg space-y-6">
                    <p>
                        Name: {{$user->name}}
                    </p>
                    <p>
                        Email: {{$user->email}}
                    </p>
                    <p>
                        Contact Number: {{$user->contact_number}}
                    </p>
                    <a href="/listings" class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-globe"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>