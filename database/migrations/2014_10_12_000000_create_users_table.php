<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap', 50);
            $table->string('nama_panggilan', 20);
            $table->string('agama', 15);
            $table->string('jenis_kelamin', 20);
            $table->string('tempat_tanggal_lahir', 30);
            $table->string('no_hp', 15);
            $table->string('email')->unique();
            $table->text('alamat_ktp', 100);
            $table->text('alamat_domisili', 100);
            $table->bigInteger('jumlah_cuti')->nullable();
            $table->string('avatar', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
