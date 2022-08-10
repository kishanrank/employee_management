<?php

use App\Models\Employee;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $employee = new Employee();
        Schema::create($employee->getTable(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('dob');
            $table->string('photo');
            $table->decimal('salary', 10, 2);
            $table->boolean('status');
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
        $employee = new Employee();
        Schema::dropIfExists($employee->getTable());
    }
};
