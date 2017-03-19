<?php

namespace Base;

use \ElencoLingue as ChildElencoLingue;
use \ElencoLingueQuery as ChildElencoLingueQuery;
use \Exception;
use \PDO;
use Map\ElencoLingueTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'elenco_lingue' table.
 *
 *
 *
 * @method     ChildElencoLingueQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildElencoLingueQuery orderByLingua($order = Criteria::ASC) Order by the lingua column
 *
 * @method     ChildElencoLingueQuery groupById() Group by the ID column
 * @method     ChildElencoLingueQuery groupByLingua() Group by the lingua column
 *
 * @method     ChildElencoLingueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildElencoLingueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildElencoLingueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildElencoLingueQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildElencoLingueQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildElencoLingueQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildElencoLingue findOne(ConnectionInterface $con = null) Return the first ChildElencoLingue matching the query
 * @method     ChildElencoLingue findOneOrCreate(ConnectionInterface $con = null) Return the first ChildElencoLingue matching the query, or a new ChildElencoLingue object populated from the query conditions when no match is found
 *
 * @method     ChildElencoLingue findOneById(int $ID) Return the first ChildElencoLingue filtered by the ID column
 * @method     ChildElencoLingue findOneByLingua(string $lingua) Return the first ChildElencoLingue filtered by the lingua column *

 * @method     ChildElencoLingue requirePk($key, ConnectionInterface $con = null) Return the ChildElencoLingue by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildElencoLingue requireOne(ConnectionInterface $con = null) Return the first ChildElencoLingue matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildElencoLingue requireOneById(int $ID) Return the first ChildElencoLingue filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildElencoLingue requireOneByLingua(string $lingua) Return the first ChildElencoLingue filtered by the lingua column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildElencoLingue[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildElencoLingue objects based on current ModelCriteria
 * @method     ChildElencoLingue[]|ObjectCollection findById(int $ID) Return ChildElencoLingue objects filtered by the ID column
 * @method     ChildElencoLingue[]|ObjectCollection findByLingua(string $lingua) Return ChildElencoLingue objects filtered by the lingua column
 * @method     ChildElencoLingue[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ElencoLingueQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ElencoLingueQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ElencoLingue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildElencoLingueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildElencoLingueQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildElencoLingueQuery) {
            return $criteria;
        }
        $query = new ChildElencoLingueQuery();
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
     * @return ChildElencoLingue|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ElencoLingueTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ElencoLingueTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildElencoLingue A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, lingua FROM elenco_lingue WHERE ID = :p0';
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
            /** @var ChildElencoLingue $obj */
            $obj = new ChildElencoLingue();
            $obj->hydrate($row);
            ElencoLingueTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildElencoLingue|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildElencoLingueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ElencoLingueTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildElencoLingueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ElencoLingueTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildElencoLingueQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ElencoLingueTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ElencoLingueTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElencoLingueTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the lingua column
     *
     * Example usage:
     * <code>
     * $query->filterByLingua('fooValue');   // WHERE lingua = 'fooValue'
     * $query->filterByLingua('%fooValue%', Criteria::LIKE); // WHERE lingua LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lingua The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildElencoLingueQuery The current query, for fluid interface
     */
    public function filterByLingua($lingua = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lingua)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ElencoLingueTableMap::COL_LINGUA, $lingua, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildElencoLingue $elencoLingue Object to remove from the list of results
     *
     * @return $this|ChildElencoLingueQuery The current query, for fluid interface
     */
    public function prune($elencoLingue = null)
    {
        if ($elencoLingue) {
            $this->addUsingAlias(ElencoLingueTableMap::COL_ID, $elencoLingue->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the elenco_lingue table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ElencoLingueTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ElencoLingueTableMap::clearInstancePool();
            ElencoLingueTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ElencoLingueTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ElencoLingueTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ElencoLingueTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ElencoLingueTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ElencoLingueQuery
