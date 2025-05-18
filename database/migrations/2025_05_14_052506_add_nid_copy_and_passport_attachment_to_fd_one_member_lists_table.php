<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNidCopyAndPassportAttachmentToFdOneMemberListsTable extends Migration
{
public function up()
{
Schema::table('fd_one_member_lists', function (Blueprint $table) {
$table->string('nid_copy')->nullable();
$table->string('passport_attachment')->nullable();
});
}

public function down()
{
Schema::table('fd_one_member_lists', function (Blueprint $table) {
$table->dropColumn('nid_copy');
$table->dropColumn('passport_attachment');
});
}
}
