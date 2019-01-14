<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaracmsEmailTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laracms_mail_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon');
            $table->timestamps();
        });

        Schema::create('laracms_mail_template_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('laracms_mail_template_id')->unsigned();
            $table->string('title');
            $table->text('body');
            $table->string('locale')->index();

            $table->unique(['laracms_mail_template_id','locale'], 'template_id_locale');
            $table->foreign('laracms_mail_template_id', 'template_id_foreign')->references('id')->on('laracms_mail_templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laracms_mail_template_translations');
        Schema::dropIfExists('laracms_mail_templates');
    }
}
