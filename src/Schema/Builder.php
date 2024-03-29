<?php

namespace cipwebapp\Lacassa\Schema;

use Closure;
use cipwebapp\Lacassa\Connection;
use Illuminate\Database\Schema\Builder as BaseBuilder;

class Builder extends BaseBuilder
{
    /**
     * @return void
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->grammar = $connection->getSchemaGrammar();
    }

    /**
     * @return \cipwebapp\Lacassa\Schema\Builder
     */
    protected function createBlueprint($table, Closure $callback = null)
    {
        return new Blueprint($this->connection, $table);
    }
}
