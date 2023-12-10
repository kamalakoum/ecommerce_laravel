<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         // Add the user_type_id column
         Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_type_id')->after('id');
        });

        // Add the foreign key constraint
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('user_type_id')
                ->references('id')
                ->on('user_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
