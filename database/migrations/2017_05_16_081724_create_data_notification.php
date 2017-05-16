<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_notification', function (Blueprint $table) {
            $table->increments('id')->comment('系统通知表');
            $table->string('title')->comment('标题');
            $table->string('content')->comment('内容');
            $table->string('to_user_guid')->comment('发送对象guid');
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
        Schema::dropIfExists('data_notification');
    }
}
