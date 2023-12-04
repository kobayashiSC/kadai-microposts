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
        Schema::table('user_follow', function (Blueprint $table) {

            $table->unsignedBigInteger("follow_id");
           
            
            //外部キー制約
           
            $table->foreign("follow_id")->referencec("id")->on("users")->onDelete("cascade");
            
            //user_idとfollow_idの組み合わせの重複を許さない
            $table->unique(["user_id","follow_id"]);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_follow');
    }
};
