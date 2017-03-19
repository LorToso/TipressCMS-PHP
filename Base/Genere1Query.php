<?php

namespace Base;

use \Genere1 as ChildGenere1;
use \Genere1Query as ChildGenere1Query;
use \Exception;
use \PDO;
use Map\Genere1TableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'genere1' table.
 *
 *
 *
 * @method     ChildGenere1Query orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildGenere1Query orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildGenere1Query orderByOrdine($order = Criteria::ASC) Order by the ordine column
 *
 * @method     ChildGenere1Query groupById() Group by the ID column
 * @method     ChildGenere1Query groupByNome() Group by the nome column
 * @method     ChildGenere1Query groupByOrdine() Group by the ordine column
 *
 * @method     ChildGenere1Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGenere1Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGenere1Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGenere1Query leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGenere1Query rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGenere1Query innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGenere1 findOne(ConnectionInterface $con = null) Return the first ChildGenere1 matching the query
 * @method     ChildGenere1 findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGenere1 matching the query, or a new ChildGenere1 object populated from the query conditions when no match is found
 *
 * @method     ChildGenere1 findOneById(int $ID) Return the first ChildGenere1 filtered by the ID column
 * @method     ChildGenere1 findOneByNome(string $nome) Return the first ChildGenere1 filtered by the nome column
 * @method     ChildGenere1 findOneByOrdine(int $ordine) Return the first ChildGenere1 filtered by the ordine column *

 * @method     ChildGenere1 requirePk($key, ConnectionInterface $con = null) Return the ChildGenere1 by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGenere1 requireOne(ConnectionInterface $con = null) Return the first ChildGenere1 matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGenere1 requireOneById(int $ID) Return the first ChildGenere1 filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGenere1 requireOneByNome(string $nome) Return the first ChildGenere1 filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGenere1 requireOneByOrdine(int $ordine) Return the first ChildGenere1 filtered by the ordine column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGenere1[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGenere1 objects based on current ModelCriteria
 * @method     ChildGenere1[]|ObjectCollection findById(int $ID) Return ChildGenere1 objects filtered by the ID column
 * @method     ChildGenere1[]|ObjectCollection findByNome(string $nome) Return ChildGenere1 objects filtered by the nome column
 * @method     ChildGenere1[]|ObjectCollection findByOrdine(int $ordine) Return ChildGenere1 objects filtered by the ordine column
 * @method     ChildGenere1[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class Genere1Query extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\Genere1Query object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Genere1', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGenere1Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGenere1Query
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGenere1Query) {
            return $criteria;
        }
        $query = new ChildGenere1Query();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildGenere1|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(Genere1TableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = Genere1TableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGenere1 A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, nome, ordine FROM genere1 WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildGenere1 $obj */
            $obj = new ChildGenere1();
            $obj->hydrate($row);
            Genere1TableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildGenere1|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGenere1Query The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Genere1TableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGenere1Query The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Genere1TableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ID column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE ID = 1234
     * $query->filterById(array(12, 34)); // WHERE ID IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE ID > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGenere1Query The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(Genere1TableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(Genere1TableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Genere1TableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%', Criteria::LIKE); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGenere1Query The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Genere1TableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the ordine column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdine(1234); // WHERE ordine = 1234
     * $query->filterByOrdine(array(12, 34)); // WHERE ordine IN (12, 34)
     * $query->filterByOrdine(array('min' => 12)); // WHERE ordine > 12
     * </code>
     *
     * @param     mixed $ordine The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGenere1Query The current query, for fluid interface
     */
    public function filterByOrdine($ordine = null, $comparison = null)
    {
        if (is_array($ordine)) {
            $useMinMax = false;
            if (isset($ordine['min'])) {
                $this->addUsingAlias(Genere1TableMap::COL_ORDINE, $ordine['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ordine['max'])) {
                $this->addUsingAlias(Genere1TableMap::COL_ORDINE, $ordine['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Genere1TableMap::COL_ORDINE, $ordine, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGenere1 $genere1 Object to remove from the list of results
     *
     * @return $this|ChildGenere1Query The current query, for fluid interface
     */
    public function prune($genere1 = null)
    {
        if ($genere1) {
            $this->addUsingAlias(Genere1TableMap::COL_ID, $genere1->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the genere1 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(Genere1TableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            Genere1TableMap::clearInstancePool();
            Genere1TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(Genere1TableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(Genere1TableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            Genere1TableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            Genere1TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // Genere1Query
