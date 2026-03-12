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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('featured_image');
            $table->foreignUuid('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            //excerpt
            $table->text('excerpt');
            //tag_id
            $table->foreignId('tag_id')->nullable()->constrained('tags')->onDelete('cascade')->onUpdate('cascade');
            //status: draft, published, archived
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            //content
            $table->longText('contents');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
