<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->tinyInteger('status')->default(1);
                $table->string('phone', 20)->nullable();
                $table->timestamp('birthday')->nullable();
                $table->string('avatar', 500)->nullable();
                $table->text('description', 500)->nullable();
                $table->bigInteger('parent_user_id')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['status', 'phone', 'birthday', 'avatar', 'group_id', 'description', 'parent_user_id']);
        });
    }
}
