<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {//建立新的名為comments的table
            $table->id();//建立column主鍵(primary key)，並且為自動遞增。
            $table->text('content');
            $table->unsignedbigInteger('post_id');//設定他為外鍵(foreign key)

            //將post_id關聯到post這張table的id這個column。
            $table->foreign('post_id')
                ->references('id')->on('posts')//references:參考
                ->onDelete('cascade')->onUpdate('cascade');

            //建立create_at、update_at的column，type為date。
            //create_at會在新增時自動紀錄時間，update_at會再更新時自動紀錄時間。
            $table->timestamps();

//建議建立資料表時，最基本可以加上 <<$table->id();>> 及 <<$table->timestamps();>>
//這兩個欄位，會比較方便操作資料庫
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
