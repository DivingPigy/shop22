<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> string('game_id') -> comment('游戏id');
            $table -> string('content') -> comment('激活码');
            $table -> string('state') -> comment('库存使用状态');
            $table -> string('extracter') -> comment('激活码提取人');
            $table -> dateTime('extract_time') -> comment('激活码提取时间');
            $table -> integer('order_id') -> nullable() -> comment('订单号');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
