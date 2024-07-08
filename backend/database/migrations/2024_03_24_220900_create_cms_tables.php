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
        // slider
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image')->nullable();
            $table->string('title', 64)->index();
            $table->text('description');
            $table->text('link')->nullable();
            $table->tinyInteger('status')->default(1)->index();
            $table->Integer('sort')->default(0)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // service
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('icon')->nullable();
            $table->string('title', 64)->index();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1)->index();
            $table->Integer('sort')->default(0)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // customer
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image')->nullable();
            $table->string('name', 64)->index();
            $table->string('email', 64)->index();
            $table->string('phone', 64)->index();
            $table->text('address')->nullable();
            $table->Integer('sort')->default(0)->index();
            $table->tinyInteger('status')->default(1)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // references
        Schema::create('references', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug', 255)->index();
            $table->string('name', 255)->index();
            $table->text('description')->nullable();
            $table->tinyInteger('type')->default(0)->index();
            $table->tinyInteger('status')->default(1)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // article
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->text('image')->nullable();
            $table->string('title', 191)->unique();
            $table->string('slug', 191)->unique();
			$table->text('description')->nullable();
            $table->longText('content');
            $table->tinyInteger('status')->default(1)->index();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });

        Schema::create('articles_references', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->index();
            $table->unsignedBigInteger('reference_id')->index();
            $table->primary(["article_id", "reference_id"]);
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('no action')->onUpdate('no action');
            $table->foreign('reference_id')->references('id')->on('references')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });

        Schema::create('articles_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->unsignedBigInteger('article_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->longText('comment');
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('articles_comments')->onDelete('no action')->onUpdate('no action');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('no action')->onUpdate('no action');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });

        // faq
        Schema::create('faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question')->index();
            $table->text('answer')->nullable();
            $table->tinyInteger('status')->default(1)->index();
            $table->Integer('sort')->default(0)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // team
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image')->nullable();
            $table->string('name', 64)->index();
            $table->string('email', 64)->index();
            $table->string('phone', 64)->index();
            $table->string('position_name', 64)->index();
            $table->Integer('sort')->default(0)->index();
            $table->text('twitter')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('linked_in')->nullable();
            $table->text('address')->nullable();
            $table->tinyInteger('status')->default(1)->index();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // contact
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 64)->index();
            $table->string('email', 64)->index();
            $table->string('subject', 64)->index();
            $table->text('message');
            $table->timestamps();
            $table->tinyInteger('status')->default(1)->index();
            $table->engine = 'InnoDB';
        });


        // portfolios
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->unsignedBigInteger('reference_id')->index();
            $table->string('title', 64)->index();
            $table->text('description')->nullable();
            $table->date('project_date')->nullable()->index();
            $table->text('project_url')->nullable();
            $table->tinyInteger('status')->default(1)->index();
            $table->Integer('sort')->default(0)->index();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('no action')->onUpdate('no action');
            $table->foreign('reference_id')->references('id')->on('references')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });

        // portfolios_images
        Schema::create('portfolios_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('portfolio_id')->index();
            $table->text('image')->nullable();
            $table->tinyInteger('status')->default(0)->index();
            $table->timestamps();
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });

        // testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->text('image')->nullable();
            $table->string('name', 64)->index();
            $table->string('position', 64)->index();
            $table->text('quote')->nullable();
            $table->tinyInteger('status')->default(0)->index();
            $table->Integer('sort')->default(0)->index();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('portfolios_images');
        Schema::dropIfExists('portfolios');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('articles_comments');
        Schema::dropIfExists('articles_references');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('references');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('services');
        Schema::dropIfExists('sliders');
    }
};
