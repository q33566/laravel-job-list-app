<?php

namespace App\Models;

class JobList{
    public static function allJob(){
        return[
            [
                'id' => '1',
                'title' => 'job1',
                'description' => 'Google is a multinational technology 
                company that has become synonymous with internet search and online services. 
                Founded in 1998 by Larry Page and Sergey Brin while they were Ph.D. students at Stanford University, 
                Google has grown into one of the world\'s most influential and innovative companies. 
                The company\'s core product is its search engine, which has 
                revolutionized the way people access information on the internet.'
            ],
            [
                'id' => '2',
                'title' => 'job2',
                'description' => 'Google is a multinational technology 
                company that has become synonymous with internet search and online services. 
                Founded in 1998 by Larry Page and Sergey Brin while they were Ph.D. students at Stanford University, 
                Google has grown into one of the world\'s most influential and innovative companies. 
                The company\'s core product is its search engine, which has 
                revolutionized the way people access information on the internet.'
            ]
            ];
    }

    public static function find($id){
        $jobList = self::allJob();
        foreach($jobList as $job){
            if($id == $job['id']){
                return $job;
            }
        }
    }
}