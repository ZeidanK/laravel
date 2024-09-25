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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //$table->unsignedBigInteger('user_id');

            // $table->foreignId('user_id')
            // ->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('cascade');

            $table->string('event_name')->nullable();
            $table->string('event_slug');
            $table->string('event_date')->nullable();
            $table->string('event_time')->nullable();
            $table->text('event_location')->nullable();
            $table->string('event_description')->nullable();
            $table->string('event_image_path')->default('default.jpg');
            $table->string('event_link')->nullable();
            $table->string('event_status')->default('pending');
            $table->string('random_string')->default('default');
            $table->boolean('rsvp')->default(false);
            $table->boolean('location')->default(false);
            $table->boolean('time')->default(false);
            $table->boolean('date')->default(false);
            $table->boolean('description')->default(false);
            $table->boolean('image')->default(false);
            $table->boolean('link')->default(false);
            $table->binary('event_image')->nullable();
            $table->string('background_color')->nullable()->default('#FFFFFF');
            $table->boolean('countdown')->default(false);
            $table->string('countdown_date')->nullable();
            $table->string('countdown_option')->default('simple');
            $table->dateTime('countdown_time')->nullable();
            
            $table->boolean('Gif')->default(false);
            $table->string('GifSelect')->default('NoGif');


            $table->unsignedBigInteger('user_id');



            // Foreign key definition
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Indexes and unique constraints
            $table->unique(['user_id', 'event_slug']);
            $table->index('user_id');
            $table->index('event_slug');
            $table->index(['user_id', 'event_slug']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE events MODIFY event_image LONGBLOB');
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
