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
            $course=$course->values();
            $table->string('title')->after('id');
            $table->enum('category', $course)->before('created_at')->after('title');
            $table->string('course_code')->before('created_at')->after('category');
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
