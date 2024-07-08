<?php

/**
 * This file is part of the Sandy Andryanto Company Profile Website.
 *
 * @author     Sandy Andryanto <sandy.andryanto.dev@gmail.com>
 * @copyright  2024
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 191)->unique();
            $table->string('password', 255)->index();
            $table->string('phone', 64)->nullable()->unique();
            $table->string('image', 255)->nullable()->index();
            $table->string('first_name', 64)->nullable()->index();
            $table->string('last_name', 64)->nullable()->index();
            $table->string('gender', 2)->nullable()->index();
            $table->string('country', 191)->nullable()->index();
            $table->text('address')->nullable();
            $table->text('about_me')->nullable();
            $table->tinyInteger('status')->default(1)->index();
            $table->string('reset_token', 191)->nullable()->index();
            $table->string('confirm_token', 191)->nullable()->index();
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};