<?php

namespace Map;

use \Libri;
use \LibriQuery;
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
 * This class defines the structure of the 'libri' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class LibriTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.LibriTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'libri';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Libri';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Libri';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 31;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 31;

    /**
     * the column name for the ID field
     */
    const COL_ID = 'libri.ID';

    /**
     * the column name for the titolo field
     */
    const COL_TITOLO = 'libri.titolo';

    /**
     * the column name for the autore1 field
     */
    const COL_AUTORE1 = 'libri.autore1';

    /**
     * the column name for the autore2 field
     */
    const COL_AUTORE2 = 'libri.autore2';

    /**
     * the column name for the autore3 field
     */
    const COL_AUTORE3 = 'libri.autore3';

    /**
     * the column name for the tipo1 field
     */
    const COL_TIPO1 = 'libri.tipo1';

    /**
     * the column name for the IDgenere1 field
     */
    const COL_IDGENERE1 = 'libri.IDgenere1';

    /**
     * the column name for the tipo2 field
     */
    const COL_TIPO2 = 'libri.tipo2';

    /**
     * the column name for the IDgenere2 field
     */
    const COL_IDGENERE2 = 'libri.IDgenere2';

    /**
     * the column name for the tipo3 field
     */
    const COL_TIPO3 = 'libri.tipo3';

    /**
     * the column name for the IDgenere3 field
     */
    const COL_IDGENERE3 = 'libri.IDgenere3';

    /**
     * the column name for the editore field
     */
    const COL_EDITORE = 'libri.editore';

    /**
     * the column name for the dati_tecnici field
     */
    const COL_DATI_TECNICI = 'libri.dati_tecnici';

    /**
     * the column name for the diritti_controllati field
     */
    const COL_DIRITTI_CONTROLLATI = 'libri.diritti_controllati';

    /**
     * the column name for the diritti_concessi field
     */
    const COL_DIRITTI_CONCESSI = 'libri.diritti_concessi';

    /**
     * the column name for the descrizione_breve field
     */
    const COL_DESCRIZIONE_BREVE = 'libri.descrizione_breve';

    /**
     * the column name for the descrizione field
     */
    const COL_DESCRIZIONE = 'libri.descrizione';

    /**
     * the column name for the pdf1_ita field
     */
    const COL_PDF1_ITA = 'libri.pdf1_ita';

    /**
     * the column name for the pdf1_eng field
     */
    const COL_PDF1_ENG = 'libri.pdf1_eng';

    /**
     * the column name for the pdf1_deu field
     */
    const COL_PDF1_DEU = 'libri.pdf1_deu';

    /**
     * the column name for the pdf1_fra field
     */
    const COL_PDF1_FRA = 'libri.pdf1_fra';

    /**
     * the column name for the pdf1_esp field
     */
    const COL_PDF1_ESP = 'libri.pdf1_esp';

    /**
     * the column name for the pdf2 field
     */
    const COL_PDF2 = 'libri.pdf2';

    /**
     * the column name for the pdf3 field
     */
    const COL_PDF3 = 'libri.pdf3';

    /**
     * the column name for the pdf4 field
     */
    const COL_PDF4 = 'libri.pdf4';

    /**
     * the column name for the img_small field
     */
    const COL_IMG_SMALL = 'libri.img_small';

    /**
     * the column name for the img_big field
     */
    const COL_IMG_BIG = 'libri.img_big';

    /**
     * the column name for the vetrina field
     */
    const COL_VETRINA = 'libri.vetrina';

    /**
     * the column name for the ordine field
     */
    const COL_ORDINE = 'libri.ordine';

    /**
     * the column name for the vetrinacat field
     */
    const COL_VETRINACAT = 'libri.vetrinacat';

    /**
     * the column name for the ordinecat field
     */
    const COL_ORDINECAT = 'libri.ordinecat';

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
        self::TYPE_PHPNAME       => array('Id', 'Titolo', 'Autore1', 'Autore2', 'Autore3', 'Tipo1', 'Idgenere1', 'Tipo2', 'Idgenere2', 'Tipo3', 'Idgenere3', 'Editore', 'DatiTecnici', 'DirittiControllati', 'DirittiConcessi', 'DescrizioneBreve', 'Descrizione', 'Pdf1Ita', 'Pdf1Eng', 'Pdf1Deu', 'Pdf1Fra', 'Pdf1Esp', 'Pdf2', 'Pdf3', 'Pdf4', 'ImgSmall', 'ImgBig', 'Vetrina', 'Ordine', 'Vetrinacat', 'Ordinecat', ),
        self::TYPE_CAMELNAME     => array('id', 'titolo', 'autore1', 'autore2', 'autore3', 'tipo1', 'idgenere1', 'tipo2', 'idgenere2', 'tipo3', 'idgenere3', 'editore', 'datiTecnici', 'dirittiControllati', 'dirittiConcessi', 'descrizioneBreve', 'descrizione', 'pdf1Ita', 'pdf1Eng', 'pdf1Deu', 'pdf1Fra', 'pdf1Esp', 'pdf2', 'pdf3', 'pdf4', 'imgSmall', 'imgBig', 'vetrina', 'ordine', 'vetrinacat', 'ordinecat', ),
        self::TYPE_COLNAME       => array(LibriTableMap::COL_ID, LibriTableMap::COL_TITOLO, LibriTableMap::COL_AUTORE1, LibriTableMap::COL_AUTORE2, LibriTableMap::COL_AUTORE3, LibriTableMap::COL_TIPO1, LibriTableMap::COL_IDGENERE1, LibriTableMap::COL_TIPO2, LibriTableMap::COL_IDGENERE2, LibriTableMap::COL_TIPO3, LibriTableMap::COL_IDGENERE3, LibriTableMap::COL_EDITORE, LibriTableMap::COL_DATI_TECNICI, LibriTableMap::COL_DIRITTI_CONTROLLATI, LibriTableMap::COL_DIRITTI_CONCESSI, LibriTableMap::COL_DESCRIZIONE_BREVE, LibriTableMap::COL_DESCRIZIONE, LibriTableMap::COL_PDF1_ITA, LibriTableMap::COL_PDF1_ENG, LibriTableMap::COL_PDF1_DEU, LibriTableMap::COL_PDF1_FRA, LibriTableMap::COL_PDF1_ESP, LibriTableMap::COL_PDF2, LibriTableMap::COL_PDF3, LibriTableMap::COL_PDF4, LibriTableMap::COL_IMG_SMALL, LibriTableMap::COL_IMG_BIG, LibriTableMap::COL_VETRINA, LibriTableMap::COL_ORDINE, LibriTableMap::COL_VETRINACAT, LibriTableMap::COL_ORDINECAT, ),
        self::TYPE_FIELDNAME     => array('ID', 'titolo', 'autore1', 'autore2', 'autore3', 'tipo1', 'IDgenere1', 'tipo2', 'IDgenere2', 'tipo3', 'IDgenere3', 'editore', 'dati_tecnici', 'diritti_controllati', 'diritti_concessi', 'descrizione_breve', 'descrizione', 'pdf1_ita', 'pdf1_eng', 'pdf1_deu', 'pdf1_fra', 'pdf1_esp', 'pdf2', 'pdf3', 'pdf4', 'img_small', 'img_big', 'vetrina', 'ordine', 'vetrinacat', 'ordinecat', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Titolo' => 1, 'Autore1' => 2, 'Autore2' => 3, 'Autore3' => 4, 'Tipo1' => 5, 'Idgenere1' => 6, 'Tipo2' => 7, 'Idgenere2' => 8, 'Tipo3' => 9, 'Idgenere3' => 10, 'Editore' => 11, 'DatiTecnici' => 12, 'DirittiControllati' => 13, 'DirittiConcessi' => 14, 'DescrizioneBreve' => 15, 'Descrizione' => 16, 'Pdf1Ita' => 17, 'Pdf1Eng' => 18, 'Pdf1Deu' => 19, 'Pdf1Fra' => 20, 'Pdf1Esp' => 21, 'Pdf2' => 22, 'Pdf3' => 23, 'Pdf4' => 24, 'ImgSmall' => 25, 'ImgBig' => 26, 'Vetrina' => 27, 'Ordine' => 28, 'Vetrinacat' => 29, 'Ordinecat' => 30, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'titolo' => 1, 'autore1' => 2, 'autore2' => 3, 'autore3' => 4, 'tipo1' => 5, 'idgenere1' => 6, 'tipo2' => 7, 'idgenere2' => 8, 'tipo3' => 9, 'idgenere3' => 10, 'editore' => 11, 'datiTecnici' => 12, 'dirittiControllati' => 13, 'dirittiConcessi' => 14, 'descrizioneBreve' => 15, 'descrizione' => 16, 'pdf1Ita' => 17, 'pdf1Eng' => 18, 'pdf1Deu' => 19, 'pdf1Fra' => 20, 'pdf1Esp' => 21, 'pdf2' => 22, 'pdf3' => 23, 'pdf4' => 24, 'imgSmall' => 25, 'imgBig' => 26, 'vetrina' => 27, 'ordine' => 28, 'vetrinacat' => 29, 'ordinecat' => 30, ),
        self::TYPE_COLNAME       => array(LibriTableMap::COL_ID => 0, LibriTableMap::COL_TITOLO => 1, LibriTableMap::COL_AUTORE1 => 2, LibriTableMap::COL_AUTORE2 => 3, LibriTableMap::COL_AUTORE3 => 4, LibriTableMap::COL_TIPO1 => 5, LibriTableMap::COL_IDGENERE1 => 6, LibriTableMap::COL_TIPO2 => 7, LibriTableMap::COL_IDGENERE2 => 8, LibriTableMap::COL_TIPO3 => 9, LibriTableMap::COL_IDGENERE3 => 10, LibriTableMap::COL_EDITORE => 11, LibriTableMap::COL_DATI_TECNICI => 12, LibriTableMap::COL_DIRITTI_CONTROLLATI => 13, LibriTableMap::COL_DIRITTI_CONCESSI => 14, LibriTableMap::COL_DESCRIZIONE_BREVE => 15, LibriTableMap::COL_DESCRIZIONE => 16, LibriTableMap::COL_PDF1_ITA => 17, LibriTableMap::COL_PDF1_ENG => 18, LibriTableMap::COL_PDF1_DEU => 19, LibriTableMap::COL_PDF1_FRA => 20, LibriTableMap::COL_PDF1_ESP => 21, LibriTableMap::COL_PDF2 => 22, LibriTableMap::COL_PDF3 => 23, LibriTableMap::COL_PDF4 => 24, LibriTableMap::COL_IMG_SMALL => 25, LibriTableMap::COL_IMG_BIG => 26, LibriTableMap::COL_VETRINA => 27, LibriTableMap::COL_ORDINE => 28, LibriTableMap::COL_VETRINACAT => 29, LibriTableMap::COL_ORDINECAT => 30, ),
        self::TYPE_FIELDNAME     => array('ID' => 0, 'titolo' => 1, 'autore1' => 2, 'autore2' => 3, 'autore3' => 4, 'tipo1' => 5, 'IDgenere1' => 6, 'tipo2' => 7, 'IDgenere2' => 8, 'tipo3' => 9, 'IDgenere3' => 10, 'editore' => 11, 'dati_tecnici' => 12, 'diritti_controllati' => 13, 'diritti_concessi' => 14, 'descrizione_breve' => 15, 'descrizione' => 16, 'pdf1_ita' => 17, 'pdf1_eng' => 18, 'pdf1_deu' => 19, 'pdf1_fra' => 20, 'pdf1_esp' => 21, 'pdf2' => 22, 'pdf3' => 23, 'pdf4' => 24, 'img_small' => 25, 'img_big' => 26, 'vetrina' => 27, 'ordine' => 28, 'vetrinacat' => 29, 'ordinecat' => 30, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
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
        $this->setName('libri');
        $this->setPhpName('Libri');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Libri');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('titolo', 'Titolo', 'VARCHAR', false, 255, null);
        $this->addColumn('autore1', 'Autore1', 'INTEGER', false, null, null);
        $this->addColumn('autore2', 'Autore2', 'INTEGER', false, null, null);
        $this->addColumn('autore3', 'Autore3', 'INTEGER', false, null, null);
        $this->addColumn('tipo1', 'Tipo1', 'INTEGER', false, null, 0);
        $this->addColumn('IDgenere1', 'Idgenere1', 'INTEGER', false, null, 0);
        $this->addColumn('tipo2', 'Tipo2', 'INTEGER', false, null, 0);
        $this->addColumn('IDgenere2', 'Idgenere2', 'INTEGER', false, null, 0);
        $this->addColumn('tipo3', 'Tipo3', 'INTEGER', false, null, 0);
        $this->addColumn('IDgenere3', 'Idgenere3', 'INTEGER', false, null, 0);
        $this->addColumn('editore', 'Editore', 'VARCHAR', false, 255, null);
        $this->addColumn('dati_tecnici', 'DatiTecnici', 'CLOB', false, null, null);
        $this->addColumn('diritti_controllati', 'DirittiControllati', 'CLOB', false, null, null);
        $this->addColumn('diritti_concessi', 'DirittiConcessi', 'CLOB', false, null, null);
        $this->addColumn('descrizione_breve', 'DescrizioneBreve', 'LONGVARCHAR', false, null, null);
        $this->addColumn('descrizione', 'Descrizione', 'CLOB', false, null, null);
        $this->addColumn('pdf1_ita', 'Pdf1Ita', 'VARCHAR', false, 100, null);
        $this->addColumn('pdf1_eng', 'Pdf1Eng', 'VARCHAR', false, 100, null);
        $this->addColumn('pdf1_deu', 'Pdf1Deu', 'VARCHAR', false, 100, null);
        $this->addColumn('pdf1_fra', 'Pdf1Fra', 'VARCHAR', false, 100, null);
        $this->addColumn('pdf1_esp', 'Pdf1Esp', 'VARCHAR', false, 100, null);
        $this->addColumn('pdf2', 'Pdf2', 'VARCHAR', false, 100, null);
        $this->addColumn('pdf3', 'Pdf3', 'VARCHAR', false, 100, null);
        $this->addColumn('pdf4', 'Pdf4', 'VARCHAR', false, 100, null);
        $this->addColumn('img_small', 'ImgSmall', 'VARCHAR', false, 100, null);
        $this->addColumn('img_big', 'ImgBig', 'VARCHAR', false, 100, null);
        $this->addColumn('vetrina', 'Vetrina', 'VARCHAR', false, 2, null);
        $this->addColumn('ordine', 'Ordine', 'INTEGER', false, null, null);
        $this->addColumn('vetrinacat', 'Vetrinacat', 'VARCHAR', false, 2, null);
        $this->addColumn('ordinecat', 'Ordinecat', 'INTEGER', false, null, null);
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
        return $withPrefix ? LibriTableMap::CLASS_DEFAULT : LibriTableMap::OM_CLASS;
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
     * @return array           (Libri object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = LibriTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = LibriTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + LibriTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LibriTableMap::OM_CLASS;
            /** @var Libri $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            LibriTableMap::addInstanceToPool($obj, $key);
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
            $key = LibriTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = LibriTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Libri $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LibriTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(LibriTableMap::COL_ID);
            $criteria->addSelectColumn(LibriTableMap::COL_TITOLO);
            $criteria->addSelectColumn(LibriTableMap::COL_AUTORE1);
            $criteria->addSelectColumn(LibriTableMap::COL_AUTORE2);
            $criteria->addSelectColumn(LibriTableMap::COL_AUTORE3);
            $criteria->addSelectColumn(LibriTableMap::COL_TIPO1);
            $criteria->addSelectColumn(LibriTableMap::COL_IDGENERE1);
            $criteria->addSelectColumn(LibriTableMap::COL_TIPO2);
            $criteria->addSelectColumn(LibriTableMap::COL_IDGENERE2);
            $criteria->addSelectColumn(LibriTableMap::COL_TIPO3);
            $criteria->addSelectColumn(LibriTableMap::COL_IDGENERE3);
            $criteria->addSelectColumn(LibriTableMap::COL_EDITORE);
            $criteria->addSelectColumn(LibriTableMap::COL_DATI_TECNICI);
            $criteria->addSelectColumn(LibriTableMap::COL_DIRITTI_CONTROLLATI);
            $criteria->addSelectColumn(LibriTableMap::COL_DIRITTI_CONCESSI);
            $criteria->addSelectColumn(LibriTableMap::COL_DESCRIZIONE_BREVE);
            $criteria->addSelectColumn(LibriTableMap::COL_DESCRIZIONE);
            $criteria->addSelectColumn(LibriTableMap::COL_PDF1_ITA);
            $criteria->addSelectColumn(LibriTableMap::COL_PDF1_ENG);
            $criteria->addSelectColumn(LibriTableMap::COL_PDF1_DEU);
            $criteria->addSelectColumn(LibriTableMap::COL_PDF1_FRA);
            $criteria->addSelectColumn(LibriTableMap::COL_PDF1_ESP);
            $criteria->addSelectColumn(LibriTableMap::COL_PDF2);
            $criteria->addSelectColumn(LibriTableMap::COL_PDF3);
            $criteria->addSelectColumn(LibriTableMap::COL_PDF4);
            $criteria->addSelectColumn(LibriTableMap::COL_IMG_SMALL);
            $criteria->addSelectColumn(LibriTableMap::COL_IMG_BIG);
            $criteria->addSelectColumn(LibriTableMap::COL_VETRINA);
            $criteria->addSelectColumn(LibriTableMap::COL_ORDINE);
            $criteria->addSelectColumn(LibriTableMap::COL_VETRINACAT);
            $criteria->addSelectColumn(LibriTableMap::COL_ORDINECAT);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.titolo');
            $criteria->addSelectColumn($alias . '.autore1');
            $criteria->addSelectColumn($alias . '.autore2');
            $criteria->addSelectColumn($alias . '.autore3');
            $criteria->addSelectColumn($alias . '.tipo1');
            $criteria->addSelectColumn($alias . '.IDgenere1');
            $criteria->addSelectColumn($alias . '.tipo2');
            $criteria->addSelectColumn($alias . '.IDgenere2');
            $criteria->addSelectColumn($alias . '.tipo3');
            $criteria->addSelectColumn($alias . '.IDgenere3');
            $criteria->addSelectColumn($alias . '.editore');
            $criteria->addSelectColumn($alias . '.dati_tecnici');
            $criteria->addSelectColumn($alias . '.diritti_controllati');
            $criteria->addSelectColumn($alias . '.diritti_concessi');
            $criteria->addSelectColumn($alias . '.descrizione_breve');
            $criteria->addSelectColumn($alias . '.descrizione');
            $criteria->addSelectColumn($alias . '.pdf1_ita');
            $criteria->addSelectColumn($alias . '.pdf1_eng');
            $criteria->addSelectColumn($alias . '.pdf1_deu');
            $criteria->addSelectColumn($alias . '.pdf1_fra');
            $criteria->addSelectColumn($alias . '.pdf1_esp');
            $criteria->addSelectColumn($alias . '.pdf2');
            $criteria->addSelectColumn($alias . '.pdf3');
            $criteria->addSelectColumn($alias . '.pdf4');
            $criteria->addSelectColumn($alias . '.img_small');
            $criteria->addSelectColumn($alias . '.img_big');
            $criteria->addSelectColumn($alias . '.vetrina');
            $criteria->addSelectColumn($alias . '.ordine');
            $criteria->addSelectColumn($alias . '.vetrinacat');
            $criteria->addSelectColumn($alias . '.ordinecat');
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
        return Propel::getServiceContainer()->getDatabaseMap(LibriTableMap::DATABASE_NAME)->getTable(LibriTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(LibriTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(LibriTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new LibriTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Libri or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Libri object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(LibriTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Libri) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LibriTableMap::DATABASE_NAME);
            $criteria->add(LibriTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = LibriQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            LibriTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                LibriTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the libri table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return LibriQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Libri or Criteria object.
     *
     * @param mixed               $criteria Criteria or Libri object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LibriTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Libri object
        }

        if ($criteria->containsKey(LibriTableMap::COL_ID) && $criteria->keyContainsValue(LibriTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.LibriTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = LibriQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // LibriTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
LibriTableMap::buildTableMap();
