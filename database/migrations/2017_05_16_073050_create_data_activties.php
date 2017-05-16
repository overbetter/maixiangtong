<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataActivties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('data_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guid')->comment('活动表');
            $table->string('title')->comment('活动名称');
            $table->text('introduction')->comment('活动介绍');
            $table->text('demand')->comment('活动要求');
            $table->tinyint('status')->default(0)->comment('活动状态，默认0');
            $table->tinyint('type')->default(1)->comment('活动类别，默认1');
            $table->tinyint('is_regular')->default(1)->comment('是否为定期活动');
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
