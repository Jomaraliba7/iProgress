<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('office_type'); 
            $table->string('office_name');
            $table->string('project_name');
            $table->json('activities')->nullable(); 
            $table->json('uploaded_by')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
