<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('family_name');
            $table->string('given_name');
            $table->string('email_address')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            /* ADDRESS */
            $table->string('address')->nullable();
            $table->string('town')->nullable();
            $table->string('postal_code')->nullable();
            //ISADMIN
            $table->boolean('is_admin')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
