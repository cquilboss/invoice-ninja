<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartialAmountToInvoices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('invoices', function($table)
        {
            $table->decimal('partial', 13, 2)->nullable();
        });

        Schema::table('accounts', function($table)
        {
            $table->boolean('utf8_invoices')->default(false);
            $table->boolean('auto_wrap')->default(true);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('invoices', function($table)
        {
            $table->dropColumn('partial');
        });

        Schema::table('accounts', function($table)
        {
            $table->dropColumn('utf8_invoices');
            $table->dropColumn('auto_wrap');
        });
	}

}
