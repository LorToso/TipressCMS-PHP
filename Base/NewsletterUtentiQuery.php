<?php

namespace Base;

use \NewsletterUtenti as ChildNewsletterUtenti;
use \NewsletterUtentiQuery as ChildNewsletterUtentiQuery;
use \Exception;
use \PDO;
use Map\NewsletterUtentiTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'newsletter_utenti' table.
 *
 *
 *
 * @method     ChildNewsletterUtentiQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildNewsletterUtentiQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildNewsletterUtentiQuery orderByCognome($order = Criteria::ASC) Order by the cognome column
 * @method     ChildNewsletterUtentiQuery orderByCitta($order = Criteria::ASC) Order by the citta column
 * @method     ChildNewsletterUtentiQuery orderByStato($order = Criteria::ASC) Order by the stato column
 * @method     ChildNewsletterUtentiQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildNewsletterUtentiQuery orderByLingua($order = Criteria::ASC) Order by the lingua column
 * @method     ChildNewsletterUtentiQuery orderByTipologia($order = Criteria::ASC) Order by the tipologia column
 *
 * @method     ChildNewsletterUtentiQuery groupById() Group by the ID column
 * @method     ChildNewsletterUtentiQuery groupByNome() Group by the nome column
 * @method     ChildNewsletterUtentiQuery groupByCognome() Group by the cognome column
 * @method     ChildNewsletterUtentiQuery groupByCitta() Group by the citta column
 * @method     ChildNewsletterUtentiQuery groupByStato() Group by the stato column
 * @method     ChildNewsletterUtentiQuery groupByEmail() Group by the email column
 * @method     ChildNewsletterUtentiQuery groupByLingua() Group by the lingua column
 * @method     ChildNewsletterUtentiQuery groupByTipologia() Group by the tipologia column
 *
 * @method     ChildNewsletterUtentiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNewsletterUtentiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNewsletterUtentiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNewsletterUtentiQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNewsletterUtentiQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNewsletterUtentiQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNewsletterUtenti findOne(ConnectionInterface $con = null) Return the first ChildNewsletterUtenti matching the query
 * @method     ChildNewsletterUtenti findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNewsletterUtenti matching the query, or a new ChildNewsletterUtenti object populated from the query conditions when no match is found
 *
 * @method     ChildNewsletterUtenti findOneById(int $ID) Return the first ChildNewsletterUtenti filtered by the ID column
 * @method     ChildNewsletterUtenti findOneByNome(string $nome) Return the first ChildNewsletterUtenti filtered by the nome column
 * @method     ChildNewsletterUtenti findOneByCognome(string $cognome) Return the first ChildNewsletterUtenti filtered by the cognome column
 * @method     ChildNewsletterUtenti findOneByCitta(string $citta) Return the first ChildNewsletterUtenti filtered by the citta column
 * @method     ChildNewsletterUtenti findOneByStato(string $stato) Return the first ChildNewsletterUtenti filtered by the stato column
 * @method     ChildNewsletterUtenti findOneByEmail(string $email) Return the first ChildNewsletterUtenti filtered by the email column
 * @method     ChildNewsletterUtenti findOneByLingua(int $lingua) Return the first ChildNewsletterUtenti filtered by the lingua column
 * @method     ChildNewsletterUtenti findOneByTipologia(int $tipologia) Return the first ChildNewsletterUtenti filtered by the tipologia column *

 * @method     ChildNewsletterUtenti requirePk($key, ConnectionInterface $con = null) Return the ChildNewsletterUtenti by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletterUtenti requireOne(ConnectionInterface $con = null) Return the first ChildNewsletterUtenti matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNewsletterUtenti requireOneById(int $ID) Return the first ChildNewsletterUtenti filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletterUtenti requireOneByNome(string $nome) Return the first ChildNewsletterUtenti filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletterUtenti requireOneByCognome(string $cognome) Return the first ChildNewsletterUtenti filtered by the cognome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletterUtenti requireOneByCitta(string $citta) Return the first ChildNewsletterUtenti filtered by the citta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletterUtenti requireOneByStato(string $stato) Return the first ChildNewsletterUtenti filtered by the stato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletterUtenti requireOneByEmail(string $email) Return the first ChildNewsletterUtenti filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletterUtenti requireOneByLingua(int $lingua) Return the first ChildNewsletterUtenti filtered by the lingua column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewsletterUtenti requireOneByTipologia(int $tipologia) Return the first ChildNewsletterUtenti filtered by the tipologia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNewsletterUtenti[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNewsletterUtenti objects based on current ModelCriteria
 * @method     ChildNewsletterUtenti[]|ObjectCollection findById(int $ID) Return ChildNewsletterUtenti objects filtered by the ID column
 * @method     ChildNewsletterUtenti[]|ObjectCollection findByNome(string $nome) Return ChildNewsletterUtenti objects filtered by the nome column
 * @method     ChildNewsletterUtenti[]|ObjectCollection findByCognome(string $cognome) Return ChildNewsletterUtenti objects filtered by the cognome column
 * @method     ChildNewsletterUtenti[]|ObjectCollection findByCitta(string $citta) Return ChildNewsletterUtenti objects filtered by the citta column
 * @method     ChildNewsletterUtenti[]|ObjectCollection findByStato(string $stato) Return ChildNewsletterUtenti objects filtered by the stato column
 * @method     ChildNewsletterUtenti[]|ObjectCollection findByEmail(string $email) Return ChildNewsletterUtenti objects filtered by the email column
 * @method     ChildNewsletterUtenti[]|ObjectCollection findByLingua(int $lingua) Return ChildNewsletterUtenti objects filtered by the lingua column
 * @method     ChildNewsletterUtenti[]|ObjectCollection findByTipologia(int $tipologia) Return ChildNewsletterUtenti objects filtered by the tipologia column
 * @method     ChildNewsletterUtenti[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NewsletterUtentiQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NewsletterUtentiQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\NewsletterUtenti', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNewsletterUtentiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNewsletterUtentiQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNewsletterUtentiQuery) {
            return $criteria;
        }
        $query = new ChildNewsletterUtentiQuery();
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
     * @return ChildNewsletterUtenti|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NewsletterUtentiTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NewsletterUtentiTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildNewsletterUtenti A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, nome, cognome, citta, stato, email, lingua, tipologia FROM newsletter_utenti WHERE ID = :p0';
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
            /** @var ChildNewsletterUtenti $obj */
            $obj = new ChildNewsletterUtenti();
            $obj->hydrate($row);
            NewsletterUtentiTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildNewsletterUtenti|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NewsletterUtentiTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NewsletterUtentiTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_NOME, $nome, $comparison);
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
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterByCognome($cognome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cognome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_COGNOME, $cognome, $comparison);
    }

    /**
     * Filter the query on the citta column
     *
     * Example usage:
     * <code>
     * $query->filterByCitta('fooValue');   // WHERE citta = 'fooValue'
     * $query->filterByCitta('%fooValue%', Criteria::LIKE); // WHERE citta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $citta The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterByCitta($citta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($citta)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_CITTA, $citta, $comparison);
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
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterByStato($stato = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($stato)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_STATO, $stato, $comparison);
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
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterByLingua($lingua = null, $comparison = null)
    {
        if (is_array($lingua)) {
            $useMinMax = false;
            if (isset($lingua['min'])) {
                $this->addUsingAlias(NewsletterUtentiTableMap::COL_LINGUA, $lingua['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lingua['max'])) {
                $this->addUsingAlias(NewsletterUtentiTableMap::COL_LINGUA, $lingua['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_LINGUA, $lingua, $comparison);
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
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function filterByTipologia($tipologia = null, $comparison = null)
    {
        if (is_array($tipologia)) {
            $useMinMax = false;
            if (isset($tipologia['min'])) {
                $this->addUsingAlias(NewsletterUtentiTableMap::COL_TIPOLOGIA, $tipologia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipologia['max'])) {
                $this->addUsingAlias(NewsletterUtentiTableMap::COL_TIPOLOGIA, $tipologia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterUtentiTableMap::COL_TIPOLOGIA, $tipologia, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNewsletterUtenti $newsletterUtenti Object to remove from the list of results
     *
     * @return $this|ChildNewsletterUtentiQuery The current query, for fluid interface
     */
    public function prune($newsletterUtenti = null)
    {
        if ($newsletterUtenti) {
            $this->addUsingAlias(NewsletterUtentiTableMap::COL_ID, $newsletterUtenti->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the newsletter_utenti table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NewsletterUtentiTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NewsletterUtentiTableMap::clearInstancePool();
            NewsletterUtentiTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NewsletterUtentiTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NewsletterUtentiTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NewsletterUtentiTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NewsletterUtentiTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NewsletterUtentiQuery
