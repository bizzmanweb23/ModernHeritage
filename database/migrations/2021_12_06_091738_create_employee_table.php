<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->required();            
            $table->string('emp_name')->required();            
            $table->string('job_position')->required();            
            $table->string('tags')->nullable();            
            $table->string('work_mobile')->nullable();            
            $table->string('work_phone')->nullable();            
            $table->string('department')->nullable();            
            $table->string('manager')->nullable();            
            $table->string('coach')->nullable();            
            $table->string('default_customer')->nullable();            
            $table->string('emp_image')->nullable();            
            $table->string('contact_address')->nullable();            
            $table->string('contact_email')->nullable();            
            $table->string('contact_phone')->nullable();            
            $table->string('bank_accnt_no')->nullable();            
            $table->string('home_work_distance')->nullable();                     
            $table->string('marital_status')->nullable();            
            $table->string('emergency_contact')->nullable();            
            $table->string('emergency_phone')->nullable();            
            $table->string('edu_certificate_level')->nullable();            
            $table->string('field_of_study')->nullable();            
            $table->string('school')->nullable();            
            $table->string('nationality')->nullable();            
            $table->string('identification_no')->nullable();            
            $table->string('passport_no')->nullable();            
            $table->string('gender')->nullable();            
            $table->string('dob')->nullable();            
            $table->string('place_of_birth')->nullable();            
            $table->string('country_of_birth')->nullable();            
            $table->string('children_number')->nullable();            
            $table->string('visa_no')->nullable();            
            $table->string('work_permit_no')->nullable();            
            $table->string('visa_expire_date')->nullable();            
            $table->string('status_related_user')->nullable();            
            $table->string('status_job_position')->nullable();            
            $table->string('attendence_pin_code')->nullable();            
            $table->string('attendence_batch_id')->nullable();            
            $table->string('status')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
