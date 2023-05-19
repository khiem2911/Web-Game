<?php
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id('uid');	
            $table->string('username');
            $table->string('fullname');
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('email',100)->unique();	
            $table->string('avatar');
            $table->timestamps();
            $table->integer('moneyaccount');	
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
