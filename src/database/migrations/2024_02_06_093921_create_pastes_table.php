<?php

use App\Models\AccessModifier;
use App\Models\ExpirationTime;
use App\Models\Type;
use App\Models\User;
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
        Schema::create('pastes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->foreignIdFor(Type::class, 'type_id');
            $table->foreignIdFor(User::class, 'author_id')->nullable();
            $table->foreignIdFor(AccessModifier::class, 'access_modifier_id');
            $table->foreignIdFor(ExpirationTime::class, 'expiration_time_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pastes');
    }
};
