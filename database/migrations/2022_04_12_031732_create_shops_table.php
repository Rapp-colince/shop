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
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('city_id')->unsigned();
            $table->string('name', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        $data = [
            [1, 'Московский центральный'],
            [1, 'Московский дополнительный'],
            [2, 'Казанский центральный'],
        ];
        foreach ($data as $shop) {
            $shopModel = new \App\Models\Shops();
            $shopModel->city_id = $shop[0];
            $shopModel->name = $shop[1];
            $shopModel->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
};
