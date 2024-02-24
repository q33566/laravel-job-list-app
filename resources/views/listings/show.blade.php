<x-layout>
@include('partials._search')

<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <x-card class="p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                src="{{$job->logo ? asset('storage/'.$job->logo) : asset('/images/no-image.png')}}"
                alt=""
            />

            <h3 class="text-2xl mb-2">{{$job->title}}</h3>
            <div class="text-xl font-bold mb-4">Acme Corp</div>
                <!-- x-job-tags :tagsCsv = "$job->tags" /-->
                @php
                $tags = explode(',',$job->tags);
                @endphp
                <ul class="flex">
                    @foreach ($tags as $tag)
                        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                            <a href="/?tag={{$tag}}">{{$tag}}</a>
                        </li>
                    @endforeach
                </ul>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> Daytona, FL
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    {{$job->location}}
                </h3>
                <div class="text-lg space-y-6">
                    {{$job->description}}

                    <a
                        href="mailto:{{$job->email}}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Employer</a
                    >

                    <a
                        href="{{$job->website}}"
                        target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                        Website</a
                    >
                </div>
            </div>
        </div>
    </x-card>

    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/joblist/{{$job->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>
    </x-card>
</div>
</x-layout>