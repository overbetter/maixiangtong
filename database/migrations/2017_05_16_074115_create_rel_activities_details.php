<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelActivitiesDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('rel_activities_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('activity_guid')->comment('活动详情表');
            $table->string('title')->comment('活动名称');
            $table->string('publish_user_guid')->comment('发起人guid');
            $table->string('verify_user_guid')->comment('审核人guid');
            $table->text('detail')->comment('本次活动详情');
            $table->tinyint('status')->default(0)->comment('本次活动状态，默认0');
            $table->int('min')->default(0)->comment('最少参与人数');
            $table->int('max')->default(0)->comment('最大参与人数');
            $table->int('number')->default(0)->comment('当前参与人数');
            $table->int('verify_time')->default(0)->comment('审核时间');
            $table->int('deadline')->default(0)->comment('报名截至时间');
            $table->int('endline')->default(0)->comment('活动结束时间');
            $table->int('price')->default(0)->comment('参与本次活动价格/100');
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
