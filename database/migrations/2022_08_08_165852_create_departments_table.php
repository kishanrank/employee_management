<?php

use App\Models\Department;
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
        $department = new Department();
        Schema::create($department->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('status')->default(0)->comment("0 =>  Disabled, 1 => Enabled");
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
        $department = new Department();
        Schema::dropIfExists($department->getTable());
    }
};
