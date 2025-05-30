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
        Schema::table('impresora_datos_snmp', function (Blueprint $table) {
            $table->string('fuser_used')->nullable()->after('fuser_status');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('impresora_datos_snmp', function (Blueprint $table) {
            $table->dropColumn('fuser_used');
        });
    }
};
