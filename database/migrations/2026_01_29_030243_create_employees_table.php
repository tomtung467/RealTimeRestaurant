<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Employee\EmployeeRoleEnum;
use App\Enums\Employee\EmployeeStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code')->unique();
            $table->string('full_name');
            $table->string('phone');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->string('role')->default(EmployeeRoleEnum::WAITER->value);
            $table->string('status')->default(EmployeeStatusEnum::INACTIVE->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
