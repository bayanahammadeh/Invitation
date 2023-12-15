<?php

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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email1', 50);
            $table->string('email2', 50);
            $table->string('organization', 50);
            $table->string('mobile', 15);
            $table->integer('invitation_status');//1 internal,2 external
            $table->integer('invitation_type_mobile');//1 email,2 whatsapp
            $table->integer('invitation_type_email');//1 email,2 whatsapp
            $table->integer('order_status');//2 confirm,3 apology 1 pending
            $table->string('job', 15);
            $table->integer('is_attended');//1 no,2 yes,
            $table->unsignedBigInteger('nick_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('chair_id');
            $table->foreign('nick_id')->references('id')->on('nicke_names')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('chair_id')->references('id')->on('chairs')->onDelete('cascade');


            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
