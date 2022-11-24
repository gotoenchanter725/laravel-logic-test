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
            $table->increments('id');
            $table->string('name')->comment('username field');
            $table->string('phone')->comment('Phone Number field');
            $table->boolean('is_admin')->default(false)->comment('This user is admin?');
            $table->boolean('is_active')->default(false)->comment('This user is active?');
            $table->string('link')->nullable()->comment('link to access home page');
            $table->timestamp('expires_at')->nullable()->comment('datetime that be able to use access link');
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
