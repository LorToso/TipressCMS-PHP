<?php

namespace Base;

use \News as ChildNews;
use \NewsQuery as ChildNewsQuery;
use \Exception;
use \PDO;
use Map\NewsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'news' table.
 *
 *
 *
 * @method     ChildNewsQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildNewsQuery orderByTitolo($order = Criteria::ASC) Order by the titolo column
 * @method     ChildNewsQuery orderByTestoBreve($order = Criteria::ASC) Order by the testo_breve column
 * @method     ChildNewsQuery orderByTesto($order = Criteria::ASC) Order by the testo column
 *
 * @method     ChildNewsQuery groupById() Group by the ID column
 * @method     ChildNewsQuery groupByTitolo() Group by the titolo column
 * @method     ChildNewsQuery groupByTestoBreve() Group by the testo_breve column
 * @method     ChildNewsQuery groupByTesto() Group by the testo column
 *
 * @method     ChildNewsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNewsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNewsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNewsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNewsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNewsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNews findOne(ConnectionInterface $con = null) Return the first ChildNews matching the query
 * @method     ChildNews findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNews matching the query, or a new ChildNews object populated from the query conditions when no match is found
 *
 * @method     ChildNews findOneById(int $ID) Return the first ChildNews filtered by the ID column
 * @method     ChildNews findOneByTitolo(string $titolo) Return the first ChildNews filtered by the titolo column
 * @method     ChildNews findOneByTestoBreve(string $testo_breve) Return the first ChildNews filtered by the testo_breve column
 * @method     ChildNews findOneByTesto(string $testo) Return the first ChildNews filtered by the testo column *

 * @method     ChildNews requirePk($key, ConnectionInterface $con = null) Return the ChildNews by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOne(ConnectionInterface $con = null) Return the first ChildNews matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNews requireOneById(int $ID) Return the first ChildNews filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOneByTitolo(string $titolo) Return the first ChildNews filtered by the titolo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOneByTestoBreve(string $testo_breve) Return the first ChildNews filtered by the testo_breve column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOneByTesto(string $testo) Return the first ChildNews filtered by the testo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNews[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNews objects based on current ModelCriteria
 * @method     ChildNews[]|ObjectCollection findById(int $ID) Return ChildNews objects filtered by the ID column
 * @method     ChildNews[]|ObjectCollection findByTitolo(string $titolo) Return ChildNews objects filtered by the titolo column
 * @method     ChildNews[]|ObjectCollection findByTestoBreve(string $testo_breve) Return ChildNews objects filtered by the testo_breve column
 * @method     ChildNews[]|ObjectCollection findByTesto(string $testo) Return ChildNews objects filtered by the testo column
 * @method     ChildNews[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NewsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NewsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\News', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNewsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNewsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNewsQuery) {
            return $criteria;
        }
        $query = new ChildNewsQuery();
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
     * @return ChildNews|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NewsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NewsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildNews A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, titolo, testo_breve, testo FROM news WHERE ID = :p0';
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
            /** @var ChildNews $obj */
            $obj = new ChildNews();
            $obj->hydrate($row);
            NewsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildNews|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNewsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NewsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNewsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NewsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildNewsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NewsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NewsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the titolo column
     *
     * Example usage:
     * <code>
     * $query->filterByTitolo('fooValue');   // WHERE titolo = 'fooValue'
     * $query->filterByTitolo('%fooValue%', Criteria::LIKE); // WHERE titolo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $titolo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNewsQuery The current query, for fluid interface
     */
    public function filterByTitolo($titolo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titolo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsTableMap::COL_TITOLO, $titolo, $comparison);
    }

    /**
     * Filter the query on the testo_breve column
     *
     * Example usage:
     * <code>
     * $query->filterByTestoBreve('fooValue');   // WHERE testo_breve = 'fooValue'
     * $query->filterByTestoBreve('%fooValue%', Criteria::LIKE); // WHERE testo_breve LIKE '%fooValue%'
     * </code>
     *
     * @param     string $testoBreve The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNewsQuery The current query, for fluid interface
     */
    public function filterByTestoBreve($testoBreve = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($testoBreve)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsTableMap::COL_TESTO_BREVE, $testoBreve, $comparison);
    }

    /**
     * Filter the query on the testo column
     *
     * Example usage:
     * <code>
     * $query->filterByTesto('fooValue');   // WHERE testo = 'fooValue'
     * $query->filterByTesto('%fooValue%', Criteria::LIKE); // WHERE testo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $testo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNewsQuery The current query, for fluid interface
     */
    public function filterByTesto($testo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($testo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsTableMap::COL_TESTO, $testo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNews $news Object to remove from the list of results
     *
     * @return $this|ChildNewsQuery The current query, for fluid interface
     */
    public function prune($news = null)
    {
        if ($news) {
            $this->addUsingAlias(NewsTableMap::COL_ID, $news->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the news table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NewsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NewsTableMap::clearInstancePool();
            NewsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NewsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NewsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NewsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NewsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NewsQuery
