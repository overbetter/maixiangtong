<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelUsersDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_users_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guid')->comment('用户详情关联表');
            $table->string('name')->comment('姓名');
            $table->string('nickname')->comment('用户昵称');
            $table->string('avatar')->comment('用户头像');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_users_detail');
    }
}
