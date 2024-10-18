<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('inventory_yard_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 255);
            $table->string('agency_code', 255);
            $table->string('create_user', 255);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_yard_files');
    }
};
