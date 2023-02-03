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
    public $tableName = 't_kawasan';

    /**
     * Run the migrations.
     * @table t_kawasan
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_kawasan');
            $table->string('judul')->nullable();
            $table->text('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
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
