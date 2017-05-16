<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelFollowersActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

         //
         Schema::create('rel_followers_activities', function (Blueprint $table) {
            $table->increments('id')->comment('用户关注活动关联表');
            $table->string('activity_guid')->comment('活动guid');
            $table->string('user_guid')->comment('用户guid');
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
