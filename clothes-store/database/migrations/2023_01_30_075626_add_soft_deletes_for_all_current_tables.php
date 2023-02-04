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
        //
        Schema::table('users', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('sliders', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('menus', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('links', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('roles', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('tags', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('product_images', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('products', function (Blueprint $table) {
            //
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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('sliders', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('menus', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('links', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('roles', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('tags', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('product_images', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
    }
};
