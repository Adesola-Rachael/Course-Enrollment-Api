<?php

namespace App\Jobs;
use App\Course;
use App\Traits\ResponseTrait;
use Illuminate\Bus\Queueable;
use App\Interfaces\StatusCode;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class CourseCreateJob implements ShouldQueue
{
    use ResponseTrait;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public function handle()
    {
         factory(Course::class,50)->create();
    }
}
