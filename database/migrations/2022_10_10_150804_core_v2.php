<?php

use App\Enums\SuggestionStatus;
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
        if (!Schema::hasColumn('suggestions', 'status')) {
            Schema::table('suggestions', function (Blueprint $table) {
                $table->tinyInteger('status')->after('suggestion')->comment(SuggestionStatus::class);
            });
        }

        if (!Schema::hasTable('suggestion_setting')) {
            Schema::create('suggestion_setting', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('screen')->comment('Status to display screen for event guests');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('suggestions', 'status')) {
            Schema::table('suggestions', fn (Blueprint $table) => $table->dropColumn('status'));
        }

        Schema::dropIfExists('suggestion_setting');
    }
};
