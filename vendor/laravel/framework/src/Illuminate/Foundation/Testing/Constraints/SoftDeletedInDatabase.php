<?php

namespace Illuminate\Foundation\Testing\Constraints;

use Illuminate\Database\Connection;
use PHPUnit\Framework\Constraint\Constraint;

class SoftDeletedInDatabase extends Constraint
{
    /**
     * Number of records that will be shown in the console in case of failure.
     *
     * @var int
     */
    protected $show = 3;

    /**
     * The database connection.
     *
     * @var \Illuminate\Database\Connection
     */
    protected $database;

    /**
     * The data that will be used to narrow the search in the database table.
     *
     * @var array
     */
    protected $data;

    /**
<<<<<<< HEAD
=======
     * The name of the column that indicates soft deletion has occurred.
     *
     * @var string
     */
    protected $deletedAtColumn;

    /**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * Create a new constraint instance.
     *
     * @param  \Illuminate\Database\Connection  $database
     * @param  array  $data
<<<<<<< HEAD
     * @return void
     */
    public function __construct(Connection $database, array $data)
=======
     * @param  string  $deletedAtColumn
     * @return void
     */
    public function __construct(Connection $database, array $data, string $deletedAtColumn)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->data = $data;

        $this->database = $database;
<<<<<<< HEAD
=======

        $this->deletedAtColumn = $deletedAtColumn;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Check if the data is found in the given table.
     *
     * @param  string  $table
     * @return bool
     */
    public function matches($table): bool
    {
        return $this->database->table($table)
<<<<<<< HEAD
                ->where($this->data)->whereNotNull('deleted_at')->count() > 0;
=======
                ->where($this->data)
                ->whereNotNull($this->deletedAtColumn)
                ->count() > 0;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Get the description of the failure.
     *
     * @param  string  $table
     * @return string
     */
    public function failureDescription($table): string
    {
        return sprintf(
            "any soft deleted row in the table [%s] matches the attributes %s.\n\n%s",
            $table, $this->toString(), $this->getAdditionalInfo($table)
        );
    }

    /**
     * Get additional info about the records found in the database table.
     *
     * @param  string  $table
     * @return string
     */
    protected function getAdditionalInfo($table)
    {
<<<<<<< HEAD
        $results = $this->database->table($table)->get();
=======
        $query = $this->database->table($table);

        $results = $query->limit($this->show)->get();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        if ($results->isEmpty()) {
            return 'The table is empty';
        }

<<<<<<< HEAD
        $description = 'Found: '.json_encode($results->take($this->show), JSON_PRETTY_PRINT);

        if ($results->count() > $this->show) {
            $description .= sprintf(' and %s others', $results->count() - $this->show);
=======
        $description = 'Found: '.json_encode($results, JSON_PRETTY_PRINT);

        if ($query->count() > $this->show) {
            $description .= sprintf(' and %s others', $query->count() - $this->show);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $description;
    }

    /**
     * Get a string representation of the object.
     *
     * @return string
     */
    public function toString(): string
    {
        return json_encode($this->data);
    }
}
