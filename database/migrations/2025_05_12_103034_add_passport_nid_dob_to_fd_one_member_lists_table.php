
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPassportNidDobToFdOneMemberListsTable extends Migration
{
public function up()
{
Schema::table('fd_one_member_lists', function (Blueprint $table) {
$table->string('passport_number')->nullable()->after('mobile');
$table->date('dob')->nullable()->after('passport_number');
$table->string('nid_number')->nullable()->after('dob');
});
}

public function down()
{
Schema::table('fd_one_member_lists', function (Blueprint $table) {
$table->dropColumn(['passport_number', 'dob', 'nid_number']);
});
}
}
