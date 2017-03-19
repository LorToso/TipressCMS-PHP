<?php

namespace Base;

use \Newsletter as ChildNewsletter;
use \NewsletterQuery as ChildNewsletterQuery;
use \Exception;
use \PDO;
use Map\NewsletterTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'newsletter' table.
 *
 *
 *
 * @method     ChildNewsletterQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildNewsletterQuery orderByTitolo($order = Criteria::ASC) Order by the titolo column
 * @method     ChildNewsletterQuery orderByTesto($order = Criteria::ASC) Order by the testo column
 * @method     ChildNewsletterQuery orderByLingua($order = Criteria::ASC) Order by the lingua column
 * @method     ChildNewsletterQuery orderByTipologia($order = Criteria::ASC) Order by the tipologia column
 * @method     ChildNewsletterQuery orderByDatains($order = Criteria::ASC) Order by the datains column
 *
 * @method     ChildNewsletterQuery groupById() Group by the ID column
 * @method     ChildNewsletterQuery groupByTitolo() Group by the titolo column
 * @method     ChildNewsletterQuery groupByTesto() Group by the testo column
 * @method     ChildNewsletterQuery groupByLingua() Group by the lingua column
 * @method     ChildNewsletterQuery groupByTipologia() Group by the tipologia column
 * @method     ChildNewsletterQuery groupByDatains() Group by the datains column
 *
 * @method     ChildNewsletterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNewsletterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNewsletterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNewsletterQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNewsletterQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNewsletterQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNewsletter findOne(ConnectionInterface $con = null) Return the first ChildNewsletter matching the query
 * @method     ChildNewsletter findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNewsletter matching the query, or a new ChildNewsletter object populated from the query conditions when no match is found
 *
 * @method     ChildNewsletter findOneById(int $ID) Return the first ChildNewsletter filtered by the ID column
 * @method     ChildNewsletter findOneByTitolo(string $titolo) Return the first ChildNewsletter filtered by the titolo column
 * @method     ChildNewsletter findOneByTesto(string $testo) Return the first ChildNewsletter filtered by the testo column
 * @method     ChildNewsletter findOneByLingua(int $lingua) Return the first ChildNewsletter filtered by the lingua column
 * @method     ChildNewsletter findOneByTipologia(int $tipologia) Return the first ChildNewsletter filtered by the tipologia column
 * @method     ChildNewsletter findOneByDatains(string $datains) Return the first ChildNewsletter filtered by the datains column *

 * @method     ChildNewsletter requirePk($key, ConnectionInterface $con = null) Return the ChildNewsletter by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletter requireOne(ConnectionInterface $con = null) Return the first ChildNewsletter matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNewsletter requireOneById(int $ID) Return the first ChildNewsletter filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletter requireOneByTitolo(string $titolo) Return the first ChildNewsletter filtered by the titolo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletter requireOneByTesto(string $testo) Return the first ChildNewsletter filtered by the testo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletter requireOneByLingua(int $lingua) Return the first ChildNewsletter filtered by the lingua column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletter requireOneByTipologia(int $tipologia) Return the first ChildNewsletter filtered by the tipologia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletter requireOneByDatains(string $datains) Return the first ChildNewsletter filtered by the datains column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNewsletter[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNewsletter objects based on current ModelCriteria
 * @method     ChildNewsletter[]|ObjectCollection findById(int $ID) Return ChildNewsletter objects filtered by the ID column
 * @method     ChildNewsletter[]|ObjectCollection findByTitolo(string $titolo) Return ChildNewsletter objects filtered by the titolo column
 * @method     ChildNewsletter[]|ObjectCollection findByTesto(string $testo) Return ChildNewsletter objects filtered by the testo column
 * @method     ChildNewsletter[]|ObjectCollection findByLingua(int $lingua) Return ChildNewsletter objects filtered by the lingua column
 * @method     ChildNewsletter[]|ObjectCollection findByTipologia(int $tipologia) Return ChildNewsletter objects filtered by the tipologia column
 * @method     ChildNewsletter[]|ObjectCollection findByDatains(string $datains) Return ChildNewsletter objects filtered by the datains column
 * @method     ChildNewsletter[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NewsletterQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NewsletterQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Newsletter', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNewsletterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNewsletterQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNewsletterQuery) {
            return $criteria;
        }
        $query = new ChildNewsletterQuery();
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
     * @return ChildNewsletter|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NewsletterTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NewsletterTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildNewsletter A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, titolo, testo, lingua, tipologia, datains FROM newsletter WHERE ID = :p0';
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
            /** @var ChildNewsletter $obj */
            $obj = new ChildNewsletter();
            $obj->hydrate($row);
            NewsletterTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildNewsletter|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNewsletterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NewsletterTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNewsletterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NewsletterTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildNewsletterQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NewsletterTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NewsletterTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildNewsletterQuery The current query, for fluid interface
     */
    public function filterByTitolo($titolo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titolo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterTableMap::COL_TITOLO, $titolo, $comparison);
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
     * @return $this|ChildNewsletterQuery The current query, for fluid interface
     */
    public function filterByTesto($testo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($testo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterTableMap::COL_TESTO, $testo, $comparison);
    }

    /**
     * Filter the query on the lingua column
     *
     * Example usage:
     * <code>
     * $query->filterByLingua(1234); // WHERE lingua = 1234
     * $query->filterByLingua(array(12, 34)); // WHERE lingua IN (12, 34)
     * $query->filterByLingua(array('min' => 12)); // WHERE lingua > 12
     * </code>
     *
     * @param     mixed $lingua The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNewsletterQuery The current query, for fluid interface
     */
    public function filterByLingua($lingua = null, $comparison = null)
    {
        if (is_array($lingua)) {
            $useMinMax = false;
            if (isset($lingua['min'])) {
                $this->addUsingAlias(NewsletterTableMap::COL_LINGUA, $lingua['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lingua['max'])) {
                $this->addUsingAlias(NewsletterTableMap::COL_LINGUA, $lingua['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterTableMap::COL_LINGUA, $lingua, $comparison);
    }

    /**
     * Filter the query on the tipologia column
     *
     * Example usage:
     * <code>
     * $query->filterByTipologia(1234); // WHERE tipologia = 1234
     * $query->filterByTipologia(array(12, 34)); // WHERE tipologia IN (12, 34)
     * $query->filterByTipologia(array('min' => 12)); // WHERE tipologia > 12
     * </code>
     *
     * @param     mixed $tipologia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNewsletterQuery The current query, for fluid interface
     */
    public function filterByTipologia($tipologia = null, $comparison = null)
    {
        if (is_array($tipologia)) {
            $useMinMax = false;
            if (isset($tipologia['min'])) {
                $this->addUsingAlias(NewsletterTableMap::COL_TIPOLOGIA, $tipologia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipologia['max'])) {
                $this->addUsingAlias(NewsletterTableMap::COL_TIPOLOGIA, $tipologia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterTableMap::COL_TIPOLOGIA, $tipologia, $comparison);
    }

    /**
     * Filter the query on the datains column
     *
     * Example usage:
     * <code>
     * $query->filterByDatains('2011-03-14'); // WHERE datains = '2011-03-14'
     * $query->filterByDatains('now'); // WHERE datains = '2011-03-14'
     * $query->filterByDatains(array('max' => 'yesterday')); // WHERE datains > '2011-03-13'
     * </code>
     *
     * @param     mixed $datains The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNewsletterQuery The current query, for fluid interface
     */
    public function filterByDatains($datains = null, $comparison = null)
    {
        if (is_array($datains)) {
            $useMinMax = false;
            if (isset($datains['min'])) {
                $this->addUsingAlias(NewsletterTableMap::COL_DATAINS, $datains['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datains['max'])) {
                $this->addUsingAlias(NewsletterTableMap::COL_DATAINS, $datains['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterTableMap::COL_DATAINS, $datains, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNewsletter $newsletter Object to remove from the list of results
     *
     * @return $this|ChildNewsletterQuery The current query, for fluid interface
     */
    public function prune($newsletter = null)
    {
        if ($newsletter) {
            $this->addUsingAlias(NewsletterTableMap::COL_ID, $newsletter->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the newsletter table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NewsletterTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NewsletterTableMap::clearInstancePool();
            NewsletterTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NewsletterTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NewsletterTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NewsletterTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NewsletterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NewsletterQuery
