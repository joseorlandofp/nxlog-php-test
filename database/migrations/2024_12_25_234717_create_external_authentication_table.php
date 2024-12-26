<?php

use App\Enums\User\UserOriginEnum;
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
        Schema::create('external_authentications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('origin', 255)->default(UserOriginEnum::LINKEDIN->value);
            $table->string('external_id', 255);
            $table->text('token');
            $table->text('refresh_token')->nullable();
            $table->string('expires_in', 255)->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_authentications');
    }
};
