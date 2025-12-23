<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority', function (Blueprint $table) {
            $table->id();
            $table->string('type', 255);
            $table->timestamps();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users_app')->onDelete('cascade');
            $table->string('title', 255);
            $table->string('description',255);
            $table->date('due_date');
            $table->foreignId('priority_id')->constrained('priority')->onDelete('cascade');
            $table->integer('state')->default(0);
            $table->timestamps();
        });

        Schema::create('docs_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->string('name_doc', 255);
            $table->string('path',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priority');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('docs_tasks');
    }
}
