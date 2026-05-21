<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('number_trip')->unique();
            $table->foreignId('bus_id')->constrained('buses')->onDelete('cascade');
            $table->foreignId('route_id')->constrained('routes')->onDelete('cascade');
            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
            $table->timestamps();
        });
    }
    public function down(): void 
    {
        Schema::dropIfExists('trips');
    }
};