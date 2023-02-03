<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'keluhan';

    /**
     * Run the migrations.
     * @table keluhan
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp', 45)->nullable();
            $table->enum('status', ['0', '1'])->nullable();
            $table->text('keluhan')->nullable();
            $table->text('tanggapan')->nullable();
            $table->unsignedBigInteger('id_balai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
};
