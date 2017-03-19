<?php

namespace Base;

use \ElencoStati as ChildElencoStati;
use \ElencoStatiQuery as ChildElencoStatiQuery;
use \Exception;
use \PDO;
use Map\ElencoStatiTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'elenco_stati' table.
 *
 *
 *
 * @method     ChildElencoStatiQuery orderByStato($order = Criteria::ASC) Order by the stato column
 *
 * @method     ChildElencoStatiQuery groupByStato() Group by the stato column
 *
 * @method     ChildElencoStatiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildElencoStatiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildElencoStatiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildElencoStatiQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildElencoStatiQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildElencoStatiQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildElencoStati findOne(ConnectionInterface $con = null) Return the first ChildElencoStati matching the query
 * @method     ChildElencoStati findOneOrCreate(ConnectionInterface $con = null) Return the first ChildElencoStati matching the query, or a new ChildElencoStati object populated from the query conditions when no match is found
 *
 * @method     ChildElencoStati findOneByStato(string $stato) Return the first ChildElencoStati filtered by the stato column *

 * @method     ChildElencoStati requirePk($key, ConnectionInterface $con = null) Return the ChildElencoStati by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildElencoStati requireOne(ConnectionInterface $con = null) Return the first ChildElencoStati matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildElencoStati requireOneByStato(string $stato) Return the first ChildElencoStati filtered by the stato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildElencoStati[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildElencoStati objects based on current ModelCriteria
 * @method     ChildElencoStati[]|ObjectCollection findByStato(string $stato) Return ChildElencoStati objects filtered by the stato column
 * @method     ChildElencoStati[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ElencoStatiQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ElencoStatiQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ElencoStati', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildElencoStatiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildElencoStatiQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildElencoStatiQuery) {
            return $criteria;
        }
        $query = new ChildElencoStatiQuery();
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
     * @return ChildElencoStati|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ElencoStatiTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ElencoStatiTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildElencoStati A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT stato FROM elenco_stati WHERE stato = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildElencoStati $obj */
            $obj = new ChildElencoStati();
            $obj->hydrate($row);
            ElencoStatiTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildElencoStati|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildElencoStatiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ElencoStatiTableMap::COL_STATO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildElencoStatiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ElencoStatiTableMap::COL_STATO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the stato column
     *
     * Example usage:
     * <code>
     * $query->filterByStato('fooValue');   // WHERE stato = 'fooValue'
     * $query->filterByStato('%fooValue%', Criteria::LIKE); // WHERE stato LIKE '%fooValue%'
     * </code>
     *
     * @param     string $stato The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildElencoStatiQuery The current query, for fluid interface
     */
    public function filterByStato($stato = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($stato)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElencoStatiTableMap::COL_STATO, $stato, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildElencoStati $elencoStati Object to remove from the list of results
     *
     * @return $this|ChildElencoStatiQuery The current query, for fluid interface
     */
    public function prune($elencoStati = null)
    {
        if ($elencoStati) {
            $this->addUsingAlias(ElencoStatiTableMap::COL_STATO, $elencoStati->getStato(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the elenco_stati table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ElencoStatiTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ElencoStatiTableMap::clearInstancePool();
            ElencoStatiTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ElencoStatiTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ElencoStatiTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ElencoStatiTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ElencoStatiTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ElencoStatiQuery
