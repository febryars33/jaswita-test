<?php

use App\Models\Manager;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Snairbef\Regional\Models\District;
use Snairbef\Regional\Models\Province;
use Snairbef\Regional\Models\Regency;
use Snairbef\Regional\Models\SubDistrict;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Province::class)->nullable();
            $table->foreignIdFor(Regency::class)->nullable();
            $table->foreignIdFor(District::class)->nullable();
            $table->foreignIdFor(SubDistrict::class)->nullable();
            $table->foreignIdFor(Manager::class);
            $table->string('code')->unique();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
