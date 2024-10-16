

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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('guest_slug')->default('default');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->boolean('is_attending')->default(false);
            $table->text('notes')->nullable();
            $table->boolean('open_link')->default(0);
            //$table->unique(['event_id', 'user_id']);
            $table->index('event_id');
            $table->index('user_id');
            //$table->index('guest_slug');
            //$table->index(['event_id', 'guest_slug']);
            //$table->index(['guest_slug', 'event_id']);
            $table->index(['user_id', 'event_id']);
            $table->timestamps();
            $table->boolean('has_error')->default(false);
            // Foreign key definition
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
};
