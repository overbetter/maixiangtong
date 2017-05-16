<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelUserActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('rel_user_activities', function (Blueprint $table) {
            $table->increments('id')->comment('用户参与活动关联表');
            $table->string('activity_guid')->comment('活动guid');
            $table->string('user_guid')->comment('用户guid');
            $table->tinyint('status')->default(0)->comment('参加活动，反悔推出活动');
            $table->tinyint('is_pay')->default(0)->comment('是否付费');
            $table->int('price')->default(0)->comment('付费价格/100');
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
        //
    }
}
