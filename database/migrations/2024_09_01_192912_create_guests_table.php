

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
            $table->string('guest_slug');
            $table->unsignedBigInteger('event_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->boolean('is_attending')->default(NULL);
            $table->text('notes')->nullable();
            $table->boolean('open_link')->default(false);
            //$table->foreign('event_id')->references('id')->on('events');
            //$table->unique(['event_id', 'guest_slug']);
            //$table->index('event_id');
            //$table->index('guest_slug');
            //$table->index(['event_id', 'guest_slug']);
            //$table->index(['guest_slug', 'event_id']);
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
        Schema::dropIfExists('guests');
    }
};
