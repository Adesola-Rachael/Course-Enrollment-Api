<?php

use App\Enums\CourseCategoryEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('courses', function (Blueprint $table) {
            $course=new CourseCategoryEnum;
            $coursen=$course->values();

            $table->string('title');
            $table->enum('category', [$course]);
            $table->string('course_code');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
}
