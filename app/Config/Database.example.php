<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     *
     * @var string
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'TU_USUARIO_MARIADB',
        'password'     => 'TU_PASSWORD_MARIADB',
        'database'     => 'umg',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_unicode_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
        'foundRows'    => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    /**
     * Database connection for testing.
     *
     * @var array<string, mixed>
     */
    public array $tests = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'TU_USUARIO_MARIADB',
        'password'     => 'TU_PASSWORD_MARIADB',
        'database'     => 'ci4_test',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => 'test_',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_unicode_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
        'foundRows'    => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    /**
     * Constructor to load environment variables
     */
    public function __construct()
    {
        parent::__construct();
        
        // Load environment variables after construction
        $this->loadEnvironmentConfig();
    }

    /**
     * Load configuration from environment variables
     */
    private function loadEnvironmentConfig(): void
    {
        // Update default connection with environment variables
        $this->default['hostname'] = env('database.default.hostname', 'localhost');
        $this->default['username'] = env('database.default.username', 'TU_USUARIO_MARIADB');
        $this->default['password'] = env('database.default.password', 'TU_PASSWORD_MARIADB');
        $this->default['database'] = env('database.default.database', 'umg');
        $this->default['DBDriver'] = env('database.default.DBDriver', 'MySQLi');
        $this->default['DBPrefix'] = env('database.default.DBPrefix', '');
        $this->default['port'] = (int) env('database.default.port', 3306);

        // Update tests connection with environment variables
        $this->tests['hostname'] = env('database.tests.hostname', 'localhost');
        $this->tests['username'] = env('database.tests.username', 'TU_USUARIO_MARIADB');
        $this->default['password'] = env('database.tests.password', 'TU_PASSWORD_MARIADB');
        $this->tests['database'] = env('database.tests.database', 'ci4_test');
        $this->tests['DBDriver'] = env('database.tests.DBDriver', 'MySQLi');
        $this->tests['DBPrefix'] = env('database.tests.DBPrefix', 'test_');
        $this->tests['port'] = (int) env('database.tests.port', 3306);
    }
}
