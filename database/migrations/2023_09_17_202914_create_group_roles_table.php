<?php

use App\Models\GroupRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('group_roles')) {
            Schema::create('group_roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('key_role')->unique();
                $table->text('roles')->nullable();
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }
        GroupRole::insert([
            [
                'name' => 'Admin',
                'key_role' => 'admin',
                'roles' => '[]',
                'description' => 'Quyền cao nhất'
            ],
            [
                'name' => 'Manager',
                'key_role' => 'manager',
                'roles' => '[]',
                'description' => 'Người quản lý'
            ],
            [
                'name' => 'Reader',
                'key_role' => 'reader',
                'roles' => '[]',
                'description' => 'Người đọc, người sử dụng'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_roles');
    }
}
