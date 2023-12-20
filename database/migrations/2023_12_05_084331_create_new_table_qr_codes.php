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
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token')->unique();
            $table->timestamp('expires_at');
            $table->biginteger('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('qr_codes');
    }
};
