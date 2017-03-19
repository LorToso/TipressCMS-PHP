<?php

namespace Map;

use \Coagenti;
use \CoagentiQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'coagenti' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CoagentiTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CoagentiTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'coagenti';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Coagenti';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Coagenti';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the ID field
     */
    const COL_ID = 'coagenti.ID';

    /**
     * the column name for the cognome field
     */
    const COL_COGNOME = 'coagenti.cognome';

    /**
     * the column name for the nome field
     */
    const COL_NOME = 'coagenti.nome';

    /**
     * the column name for the area field
     */
    const COL_AREA = 'coagenti.area';

    /**
     * the column name for the indirizzo field
     */
    const COL_INDIRIZZO = 'coagenti.indirizzo';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'coagenti.email';

    /**
     * the column name for the sito field
     */
    const COL_SITO = 'coagenti.sito';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Cognome', 'Nome', 'Area', 'Indirizzo', 'Email', 'Sito', ),
        self::TYPE_CAMELNAME     => array('id', 'cognome', 'nome', 'area', 'indirizzo', 'email', 'sito', ),
        self::TYPE_COLNAME       => array(CoagentiTableMap::COL_ID, CoagentiTableMap::COL_COGNOME, CoagentiTableMap::COL_NOME, CoagentiTableMap::COL_AREA, CoagentiTableMap::COL_INDIRIZZO, CoagentiTableMap::COL_EMAIL, CoagentiTableMap::COL_SITO, ),
        self::TYPE_FIELDNAME     => array('ID', 'cognome', 'nome', 'area', 'indirizzo', 'email', 'sito', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Cognome' => 1, 'Nome' => 2, 'Area' => 3, 'Indirizzo' => 4, 'Email' => 5, 'Sito' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'cognome' => 1, 'nome' => 2, 'area' => 3, 'indirizzo' => 4, 'email' => 5, 'sito' => 6, ),
        self::TYPE_COLNAME       => array(CoagentiTableMap::COL_ID => 0, CoagentiTableMap::COL_COGNOME => 1, CoagentiTableMap::COL_NOME => 2, CoagentiTableMap::COL_AREA => 3, CoagentiTableMap::COL_INDIRIZZO => 4, CoagentiTableMap::COL_EMAIL => 5, CoagentiTableMap::COL_SITO => 6, ),
        self::TYPE_FIELDNAME     => array('ID' => 0, 'cognome' => 1, 'nome' => 2, 'area' => 3, 'indirizzo' => 4, 'email' => 5, 'sito' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('coagenti');
        $this->setPhpName('Coagenti');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Coagenti');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('cognome', 'Cognome', 'VARCHAR', false, 100, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', false, 100, null);
        $this->addColumn('area', 'Area', 'VARCHAR', false, 100, null);
        $this->addColumn('indirizzo', 'Indirizzo', 'VARCHAR', false, 100, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 100, null);
        $this->addColumn('sito', 'Sito', 'VARCHAR', false, 100, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CoagentiTableMap::CLASS_DEFAULT : CoagentiTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Coagenti object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CoagentiTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CoagentiTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CoagentiTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CoagentiTableMap::OM_CLASS;
            /** @var Coagenti $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CoagentiTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CoagentiTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CoagentiTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Coagenti $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CoagentiTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CoagentiTableMap::COL_ID);
            $criteria->addSelectColumn(CoagentiTableMap::COL_COGNOME);
            $criteria->addSelectColumn(CoagentiTableMap::COL_NOME);
            $criteria->addSelectColumn(CoagentiTableMap::COL_AREA);
            $criteria->addSelectColumn(CoagentiTableMap::COL_INDIRIZZO);
            $criteria->addSelectColumn(CoagentiTableMap::COL_EMAIL);
            $criteria->addSelectColumn(CoagentiTableMap::COL_SITO);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.cognome');
            $criteria->addSelectColumn($alias . '.nome');
            $criteria->addSelectColumn($alias . '.area');
            $criteria->addSelectColumn($alias . '.indirizzo');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.sito');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CoagentiTableMap::DATABASE_NAME)->getTable(CoagentiTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CoagentiTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CoagentiTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CoagentiTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Coagenti or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Coagenti object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CoagentiTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Coagenti) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CoagentiTableMap::DATABASE_NAME);
            $criteria->add(CoagentiTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CoagentiQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CoagentiTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CoagentiTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the coagenti table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CoagentiQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Coagenti or Criteria object.
     *
     * @param mixed               $criteria Criteria or Coagenti object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CoagentiTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Coagenti object
        }

        if ($criteria->containsKey(CoagentiTableMap::COL_ID) && $criteria->keyContainsValue(CoagentiTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CoagentiTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = CoagentiQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CoagentiTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CoagentiTableMap::buildTableMap();
