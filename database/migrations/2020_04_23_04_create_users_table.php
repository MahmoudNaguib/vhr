<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['admin','recruiter','employee'])->nullable()->index();
            /////// Admin
            $table->bigInteger('role_id')->nullable()->index();
            /////////////////// recruiter
            $table->bigInteger('company_id')->nullable()->index();
            $table->boolean('is_company_admin')->nullable()->default(0)->index();
            /////////////////
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            //////// Profile
            $table->enum('gender', ['m', 'f'])->nullable()->default('m')->index();
            $table->bigInteger('country_id')->nullable()->index();
            $table->string('city')->nullable();
            $table->string('national_id')->nullable();
            $table->string('degree')->nullable()->index();
            $table->date('birth_date')->nullable();
            $table->text('bio')->nullable();
            $table->string('youtube_video')->nullable();
            //////// Profile
            $table->string('token')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('confirm_token')->nullable();
            $table->string('password_token')->nullable();
            $table->boolean('confirmed')->nullable()->default(0)->index();
            $table->boolean('is_active')->nullable()->default(1)->index();
            $table->boolean('is_verified')->nullable()->default(0)->index();
            $table->timestamp('last_logged_in_at')->nullable();
            $table->string('last_ip')->nullable();
            $table->boolean('completed_profile')->nullable()->default(0)->index();
            $table->bigInteger('created_by')->nullable()->index();
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable()->index();
        });
        if (app()->environment() != 'testing') {
            Schema::table('users', function (Blueprint $table) {
                \DB::statement('ALTER TABLE users ADD FULLTEXT search(name,email,mobile)');
            });
        }
    }

    /**
     *
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
}
