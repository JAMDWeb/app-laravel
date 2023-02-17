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
    {  // modificando campos de una tabla
        Schema::table('productos', function (Blueprint $table) {
            $table->string('codigo', 20)->unique()->change();// vamos a modificar
            $table->text('descripcion')->nullable()->change();
            // Renomnbrar el nombre del campo
            // $table->renameColumn('descripcion', 'detalles');

            $table->after('existencia', function($table){
                $table->foreignId('categoria_id')
                ->constrained('categorias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            });

            // Otra alternativa es: pero no podemos indicar ubicacion y otros parametros
            //$table->foreign('categoria_id')->references('id')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_categoria_id_foreign');
            $table->dropColumn('categoria_id');
            $table->dropUnique('productos_codigo_unique');

        });
    }
};
