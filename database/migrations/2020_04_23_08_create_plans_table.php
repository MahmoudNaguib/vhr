<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyText('title')->nullable();
            $table->integer('users_count')->nullable()->default(0);
            $table->integer('unlock_count')->nullable()->default(0);
            $table->integer('posts_count')->nullable()->default(0);
            $table->integer('duration_in_month')->nullable()->default(0);
            $table->float('price', 11, 2)->nullable()->default(0)->index();
            $table->bigInteger('created_by')->index()->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable()->index();
        });
        if (app()->environment() != 'testing') {
            Schema::table('plans', function (Blueprint $table) {
                \DB::statement('ALTER TABLE plans ADD FULLTEXT search(title)');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('plans');
    }

}
