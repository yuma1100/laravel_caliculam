<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->comment('タイトル');
            $table->text('body')->comment('本文');
            $table->dateTime('created_at')->comment('作成日時')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->comment('更新日時')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->dateTime('deleted_at')->nullable()->comment('削除日時');
            $table->index(['updated_at']);
        });
        DB::statement("ALTER TABLE posts COMMENT '投稿'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
