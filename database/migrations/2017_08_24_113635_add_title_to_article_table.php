<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
            $table->string('author', 20)->after('id')->comment('作者');
            $table->unsignedTinyInteger('status')->comment('article status')->after('author');
            $table->string('title', 50)->after('status')->comment('标题');
            $table->text('content')->after('title')->comment('内容');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
            $table->dropColumn('title');
            $table->dropColumn('content');
            $table->dropColumn('status');
            $table->dropColumn('author');
        });
    }
}
