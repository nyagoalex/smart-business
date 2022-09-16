<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->index();
            $table->string('email', 50)->unique();
            $table->string('phone', 20)->nullable();
            $table->boolean('active')->default(true);
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('title');
            $table->string('next_of_kin_name', 100);
            $table->string('next_of_kin_phone')->nullable();
            $table->timestamp('last_logged_in_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
