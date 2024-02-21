<!-- PHP syntax without blade
<?php foreach ($jobList as $job): ?>
    <h2><?php echo $job['title'] ?></h2>
    <p><?php echo $job['description'] ?></p>
<?php endforeach; ?> 
-->
<!-- blade provide php directive 
@php
    
@endphp
-->
<x-layout>
@include('partials._hero')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@if(count($jobList)==0)
 <p>No jobs available</p>
@endif

@foreach($jobList as $job)
<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="jobList/{{$job->id}}">{{$job->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$job->company}}</div>
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
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$job->location}}
            </div>
        </div>
    </div>
</x-card>
@endforeach
<div class="mt-6 p-4">
    {{$jobList->links()}}
</div>

</x-layout>