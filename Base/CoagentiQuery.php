<?php

namespace Base;

use \Coagenti as ChildCoagenti;
use \CoagentiQuery as ChildCoagentiQuery;
use \Exception;
use \PDO;
use Map\CoagentiTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'coagenti' table.
 *
 *
 *
 * @method     ChildCoagentiQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildCoagentiQuery orderByCognome($order = Criteria::ASC) Order by the cognome column
 * @method     ChildCoagentiQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildCoagentiQuery orderByArea($order = Criteria::ASC) Order by the area column
 * @method     ChildCoagentiQuery orderByIndirizzo($order = Criteria::ASC) Order by the indirizzo column
 * @method     ChildCoagentiQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildCoagentiQuery orderBySito($order = Criteria::ASC) Order by the sito column
 *
 * @method     ChildCoagentiQuery groupById() Group by the ID column
 * @method     ChildCoagentiQuery groupByCognome() Group by the cognome column
 * @method     ChildCoagentiQuery groupByNome() Group by the nome column
 * @method     ChildCoagentiQuery groupByArea() Group by the area column
 * @method     ChildCoagentiQuery groupByIndirizzo() Group by the indirizzo column
 * @method     ChildCoagentiQuery groupByEmail() Group by the email column
 * @method     ChildCoagentiQuery groupBySito() Group by the sito column
 *
 * @method     ChildCoagentiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCoagentiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCoagentiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCoagentiQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCoagentiQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCoagentiQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCoagenti findOne(ConnectionInterface $con = null) Return the first ChildCoagenti matching the query
 * @method     ChildCoagenti findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCoagenti matching the query, or a new ChildCoagenti object populated from the query conditions when no match is found
 *
 * @method     ChildCoagenti findOneById(int $ID) Return the first ChildCoagenti filtered by the ID column
 * @method     ChildCoagenti findOneByCognome(string $cognome) Return the first ChildCoagenti filtered by the cognome column
 * @method     ChildCoagenti findOneByNome(string $nome) Return the first ChildCoagenti filtered by the nome column
 * @method     ChildCoagenti findOneByArea(string $area) Return the first ChildCoagenti filtered by the area column
 * @method     ChildCoagenti findOneByIndirizzo(string $indirizzo) Return the first ChildCoagenti filtered by the indirizzo column
 * @method     ChildCoagenti findOneByEmail(string $email) Return the first ChildCoagenti filtered by the email column
 * @method     ChildCoagenti findOneBySito(string $sito) Return the first ChildCoagenti filtered by the sito column *

 * @method     ChildCoagenti requirePk($key, ConnectionInterface $con = null) Return the ChildCoagenti by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoagenti requireOne(ConnectionInterface $con = null) Return the first ChildCoagenti matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCoagenti requireOneById(int $ID) Return the first ChildCoagenti filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoagenti requireOneByCognome(string $cognome) Return the first ChildCoagenti filtered by the cognome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoagenti requireOneByNome(string $nome) Return the first ChildCoagenti filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoagenti requireOneByArea(string $area) Return the first ChildCoagenti filtered by the area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoagenti requireOneByIndirizzo(string $indirizzo) Return the first ChildCoagenti filtered by the indirizzo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoagenti requireOneByEmail(string $email) Return the first ChildCoagenti filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCoagenti requireOneBySito(string $sito) Return the first ChildCoagenti filtered by the sito column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCoagenti[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCoagenti objects based on current ModelCriteria
 * @method     ChildCoagenti[]|ObjectCollection findById(int $ID) Return ChildCoagenti objects filtered by the ID column
 * @method     ChildCoagenti[]|ObjectCollection findByCognome(string $cognome) Return ChildCoagenti objects filtered by the cognome column
 * @method     ChildCoagenti[]|ObjectCollection findByNome(string $nome) Return ChildCoagenti objects filtered by the nome column
 * @method     ChildCoagenti[]|ObjectCollection findByArea(string $area) Return ChildCoagenti objects filtered by the area column
 * @method     ChildCoagenti[]|ObjectCollection findByIndirizzo(string $indirizzo) Return ChildCoagenti objects filtered by the indirizzo column
 * @method     ChildCoagenti[]|ObjectCollection findByEmail(string $email) Return ChildCoagenti objects filtered by the email column
 * @method     ChildCoagenti[]|ObjectCollection findBySito(string $sito) Return ChildCoagenti objects filtered by the sito column
 * @method     ChildCoagenti[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CoagentiQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CoagentiQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Coagenti', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCoagentiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCoagentiQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCoagentiQuery) {
            return $criteria;
        }
        $query = new ChildCoagentiQuery();
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
     * @return ChildCoagenti|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CoagentiTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CoagentiTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCoagenti A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, cognome, nome, area, indirizzo, email, sito FROM coagenti WHERE ID = :p0';
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
            /** @var ChildCoagenti $obj */
            $obj = new ChildCoagenti();
            $obj->hydrate($row);
            CoagentiTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCoagenti|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CoagentiTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CoagentiTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CoagentiTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CoagentiTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoagentiTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the cognome column
     *
     * Example usage:
     * <code>
     * $query->filterByCognome('fooValue');   // WHERE cognome = 'fooValue'
     * $query->filterByCognome('%fooValue%', Criteria::LIKE); // WHERE cognome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cognome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function filterByCognome($cognome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cognome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoagentiTableMap::COL_COGNOME, $cognome, $comparison);
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
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoagentiTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the area column
     *
     * Example usage:
     * <code>
     * $query->filterByArea('fooValue');   // WHERE area = 'fooValue'
     * $query->filterByArea('%fooValue%', Criteria::LIKE); // WHERE area LIKE '%fooValue%'
     * </code>
     *
     * @param     string $area The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function filterByArea($area = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($area)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoagentiTableMap::COL_AREA, $area, $comparison);
    }

    /**
     * Filter the query on the indirizzo column
     *
     * Example usage:
     * <code>
     * $query->filterByIndirizzo('fooValue');   // WHERE indirizzo = 'fooValue'
     * $query->filterByIndirizzo('%fooValue%', Criteria::LIKE); // WHERE indirizzo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $indirizzo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function filterByIndirizzo($indirizzo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($indirizzo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoagentiTableMap::COL_INDIRIZZO, $indirizzo, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoagentiTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the sito column
     *
     * Example usage:
     * <code>
     * $query->filterBySito('fooValue');   // WHERE sito = 'fooValue'
     * $query->filterBySito('%fooValue%', Criteria::LIKE); // WHERE sito LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sito The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function filterBySito($sito = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sito)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CoagentiTableMap::COL_SITO, $sito, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCoagenti $coagenti Object to remove from the list of results
     *
     * @return $this|ChildCoagentiQuery The current query, for fluid interface
     */
    public function prune($coagenti = null)
    {
        if ($coagenti) {
            $this->addUsingAlias(CoagentiTableMap::COL_ID, $coagenti->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the coagenti table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CoagentiTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CoagentiTableMap::clearInstancePool();
            CoagentiTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CoagentiTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CoagentiTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CoagentiTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CoagentiTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CoagentiQuery
