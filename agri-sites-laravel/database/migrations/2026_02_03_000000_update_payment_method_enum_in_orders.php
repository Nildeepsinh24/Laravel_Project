<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("ALTER TABLE orders MODIFY payment_method ENUM('cod', 'card', 'netbanking') NOT NULL DEFAULT 'cod'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE orders MODIFY payment_method ENUM('cod', 'card') NOT NULL DEFAULT 'cod'");
    }
};
