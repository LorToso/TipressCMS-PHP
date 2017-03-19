<?php

namespace Base;

use \Autori as ChildAutori;
use \AutoriQuery as ChildAutoriQuery;
use \Exception;
use \PDO;
use Map\AutoriTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'autori' table.
 *
 *
 *
 * @method     ChildAutoriQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildAutoriQuery orderByCognome($order = Criteria::ASC) Order by the cognome column
 * @method     ChildAutoriQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildAutoriQuery orderByRiconoscimenti($order = Criteria::ASC) Order by the riconoscimenti column
 * @method     ChildAutoriQuery orderByBiografiaBreve($order = Criteria::ASC) Order by the biografia_breve column
 * @method     ChildAutoriQuery orderByBiografia($order = Criteria::ASC) Order by the biografia column
 * @method     ChildAutoriQuery orderByImgSmall($order = Criteria::ASC) Order by the img_small column
 * @method     ChildAutoriQuery orderByImgBig($order = Criteria::ASC) Order by the img_big column
 * @method     ChildAutoriQuery orderBySito($order = Criteria::ASC) Order by the sito column
 *
 * @method     ChildAutoriQuery groupById() Group by the ID column
 * @method     ChildAutoriQuery groupByCognome() Group by the cognome column
 * @method     ChildAutoriQuery groupByNome() Group by the nome column
 * @method     ChildAutoriQuery groupByRiconoscimenti() Group by the riconoscimenti column
 * @method     ChildAutoriQuery groupByBiografiaBreve() Group by the biografia_breve column
 * @method     ChildAutoriQuery groupByBiografia() Group by the biografia column
 * @method     ChildAutoriQuery groupByImgSmall() Group by the img_small column
 * @method     ChildAutoriQuery groupByImgBig() Group by the img_big column
 * @method     ChildAutoriQuery groupBySito() Group by the sito column
 *
 * @method     ChildAutoriQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAutoriQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAutoriQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAutoriQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAutoriQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAutoriQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAutori findOne(ConnectionInterface $con = null) Return the first ChildAutori matching the query
 * @method     ChildAutori findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAutori matching the query, or a new ChildAutori object populated from the query conditions when no match is found
 *
 * @method     ChildAutori findOneById(int $ID) Return the first ChildAutori filtered by the ID column
 * @method     ChildAutori findOneByCognome(string $cognome) Return the first ChildAutori filtered by the cognome column
 * @method     ChildAutori findOneByNome(string $nome) Return the first ChildAutori filtered by the nome column
 * @method     ChildAutori findOneByRiconoscimenti(string $riconoscimenti) Return the first ChildAutori filtered by the riconoscimenti column
 * @method     ChildAutori findOneByBiografiaBreve(string $biografia_breve) Return the first ChildAutori filtered by the biografia_breve column
 * @method     ChildAutori findOneByBiografia(string $biografia) Return the first ChildAutori filtered by the biografia column
 * @method     ChildAutori findOneByImgSmall(string $img_small) Return the first ChildAutori filtered by the img_small column
 * @method     ChildAutori findOneByImgBig(string $img_big) Return the first ChildAutori filtered by the img_big column
 * @method     ChildAutori findOneBySito(string $sito) Return the first ChildAutori filtered by the sito column *

 * @method     ChildAutori requirePk($key, ConnectionInterface $con = null) Return the ChildAutori by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutori requireOne(ConnectionInterface $con = null) Return the first ChildAutori matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAutori requireOneById(int $ID) Return the first ChildAutori filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutori requireOneByCognome(string $cognome) Return the first ChildAutori filtered by the cognome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutori requireOneByNome(string $nome) Return the first ChildAutori filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutori requireOneByRiconoscimenti(string $riconoscimenti) Return the first ChildAutori filtered by the riconoscimenti column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutori requireOneByBiografiaBreve(string $biografia_breve) Return the first ChildAutori filtered by the biografia_breve column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutori requireOneByBiografia(string $biografia) Return the first ChildAutori filtered by the biografia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutori requireOneByImgSmall(string $img_small) Return the first ChildAutori filtered by the img_small column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutori requireOneByImgBig(string $img_big) Return the first ChildAutori filtered by the img_big column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutori requireOneBySito(string $sito) Return the first ChildAutori filtered by the sito column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAutori[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAutori objects based on current ModelCriteria
 * @method     ChildAutori[]|ObjectCollection findById(int $ID) Return ChildAutori objects filtered by the ID column
 * @method     ChildAutori[]|ObjectCollection findByCognome(string $cognome) Return ChildAutori objects filtered by the cognome column
 * @method     ChildAutori[]|ObjectCollection findByNome(string $nome) Return ChildAutori objects filtered by the nome column
 * @method     ChildAutori[]|ObjectCollection findByRiconoscimenti(string $riconoscimenti) Return ChildAutori objects filtered by the riconoscimenti column
 * @method     ChildAutori[]|ObjectCollection findByBiografiaBreve(string $biografia_breve) Return ChildAutori objects filtered by the biografia_breve column
 * @method     ChildAutori[]|ObjectCollection findByBiografia(string $biografia) Return ChildAutori objects filtered by the biografia column
 * @method     ChildAutori[]|ObjectCollection findByImgSmall(string $img_small) Return ChildAutori objects filtered by the img_small column
 * @method     ChildAutori[]|ObjectCollection findByImgBig(string $img_big) Return ChildAutori objects filtered by the img_big column
 * @method     ChildAutori[]|ObjectCollection findBySito(string $sito) Return ChildAutori objects filtered by the sito column
 * @method     ChildAutori[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AutoriQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AutoriQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Autori', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAutoriQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAutoriQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAutoriQuery) {
            return $criteria;
        }
        $query = new ChildAutoriQuery();
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
     * @return ChildAutori|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AutoriTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AutoriTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAutori A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, cognome, nome, riconoscimenti, biografia_breve, biografia, img_small, img_big, sito FROM autori WHERE ID = :p0';
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
            /** @var ChildAutori $obj */
            $obj = new ChildAutori();
            $obj->hydrate($row);
            AutoriTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAutori|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AutoriTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AutoriTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AutoriTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AutoriTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutoriTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterByCognome($cognome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cognome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutoriTableMap::COL_COGNOME, $cognome, $comparison);
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
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutoriTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the riconoscimenti column
     *
     * Example usage:
     * <code>
     * $query->filterByRiconoscimenti('fooValue');   // WHERE riconoscimenti = 'fooValue'
     * $query->filterByRiconoscimenti('%fooValue%', Criteria::LIKE); // WHERE riconoscimenti LIKE '%fooValue%'
     * </code>
     *
     * @param     string $riconoscimenti The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterByRiconoscimenti($riconoscimenti = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($riconoscimenti)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutoriTableMap::COL_RICONOSCIMENTI, $riconoscimenti, $comparison);
    }

    /**
     * Filter the query on the biografia_breve column
     *
     * Example usage:
     * <code>
     * $query->filterByBiografiaBreve('fooValue');   // WHERE biografia_breve = 'fooValue'
     * $query->filterByBiografiaBreve('%fooValue%', Criteria::LIKE); // WHERE biografia_breve LIKE '%fooValue%'
     * </code>
     *
     * @param     string $biografiaBreve The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterByBiografiaBreve($biografiaBreve = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($biografiaBreve)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutoriTableMap::COL_BIOGRAFIA_BREVE, $biografiaBreve, $comparison);
    }

    /**
     * Filter the query on the biografia column
     *
     * Example usage:
     * <code>
     * $query->filterByBiografia('fooValue');   // WHERE biografia = 'fooValue'
     * $query->filterByBiografia('%fooValue%', Criteria::LIKE); // WHERE biografia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $biografia The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterByBiografia($biografia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($biografia)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutoriTableMap::COL_BIOGRAFIA, $biografia, $comparison);
    }

    /**
     * Filter the query on the img_small column
     *
     * Example usage:
     * <code>
     * $query->filterByImgSmall('fooValue');   // WHERE img_small = 'fooValue'
     * $query->filterByImgSmall('%fooValue%', Criteria::LIKE); // WHERE img_small LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imgSmall The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterByImgSmall($imgSmall = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imgSmall)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutoriTableMap::COL_IMG_SMALL, $imgSmall, $comparison);
    }

    /**
     * Filter the query on the img_big column
     *
     * Example usage:
     * <code>
     * $query->filterByImgBig('fooValue');   // WHERE img_big = 'fooValue'
     * $query->filterByImgBig('%fooValue%', Criteria::LIKE); // WHERE img_big LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imgBig The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterByImgBig($imgBig = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imgBig)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutoriTableMap::COL_IMG_BIG, $imgBig, $comparison);
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
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function filterBySito($sito = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sito)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutoriTableMap::COL_SITO, $sito, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAutori $autori Object to remove from the list of results
     *
     * @return $this|ChildAutoriQuery The current query, for fluid interface
     */
    public function prune($autori = null)
    {
        if ($autori) {
            $this->addUsingAlias(AutoriTableMap::COL_ID, $autori->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the autori table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AutoriTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AutoriTableMap::clearInstancePool();
            AutoriTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AutoriTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AutoriTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AutoriTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AutoriTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AutoriQuery
