<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('menu_icon')->nullable();
            $table->string('context')->default('yabe');
            $table->string('permission')->default('backend');
            $table->integer('sequence');
            $table->bigInteger('parent_id')->default(0);
            $table->boolean('parent')->default(false);
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
