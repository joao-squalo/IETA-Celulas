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
        Schema::table('registers', function (Blueprint $table) {
            $table->string("nameConversions")->nullable()->after("nameVisitors");
            $table->integer("totConversions")->nullable()->after("nameVisitors");
            $table->string("nameBaptism")->nullable()->after("nameVisitors");
            $table->integer("totBaptism")->nullable()->after("nameVisitors");
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registers', function (Blueprint $table) {
            $table->dropColumn("nameConversions");
            $table->dropColumn("totConversions");
            $table->dropColumn("nameBaptism");
            $table->dropColumn("totBaptism");
        });
    }
};
