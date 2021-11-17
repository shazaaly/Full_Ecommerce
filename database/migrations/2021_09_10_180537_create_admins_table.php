<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->string('phone')->nullable();
            $table->string('brand')->nullable()->default(1);
            $table->string('category')->nullable()->default(1);
            $table->string('product')->nullable()->default(1);
            $table->string('slider')->nullable()->default(1);
            $table->string('coupons')->nullable()->default(1);
            $table->string('shipping')->nullable()->default(1);
            $table->string('blog')->nullable()->default(1);
            $table->string('settings')->nullable()->default(1);
            $table->string('returnOrders')->nullable()->default(1);
            $table->string('reviews')->nullable()->default(1);
            $table->string('orders')->nullable()->default(1);
            $table->string('stock')->nullable()->default(1);
            $table->string('reports')->nullable()->default(1);
            $table->string('reports')->nullable()->default(1);
            $table->string('allUsers')->nullable()->default(1);
            $table->string('adminUserRole')->nullable()->default(1);
            $table->integer('type')->nullable()->default(1);

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
        Schema::dropIfExists('admins');
    }
}
