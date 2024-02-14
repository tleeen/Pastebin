<?php

use App\Models\Access_modifier;
use App\Models\Expiration_time;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('hash')->unique();
            $table->string('title');
            $table->text('body');
            $table->foreignIdFor(Type::class, 'type_id');
            $table->foreignIdFor(User::class, 'author_id')->nullable();
            $table->foreignIdFor(Access_modifier::class, 'access_modifier_id');
            $table->foreignIdFor(Expiration_time::class, 'expiration_time_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
