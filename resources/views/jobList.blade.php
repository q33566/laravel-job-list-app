<!-- PHP syntax without blade
<h1><?php echo $heading ?></h1>
<?php foreach ($jobList as $job): ?>
    <h2><?php echo $job['title'] ?></h2>
    <p><?php echo $job['description'] ?></p>
<?php endforeach; ?> 
-->

<!-- blade provide php directive 
@php
    
@endphp
-->
<h1>{{$heading}}</h1>

@if(count($jobList)==0)
 <p>No jobs available</p>
@endif

@foreach($jobList as $job)
    <h2>
        <a href="/jobList/{{$job['id']}}">
            {{$job['title']}}
        </a>
    </h2>
    <p>
        {{$job['description']}}
    </p>
@endforeach


