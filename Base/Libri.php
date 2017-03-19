<?php

namespace Base;

use \LibriQuery as ChildLibriQuery;
use \Exception;
use \PDO;
use Map\LibriTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'libri' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Libri implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\LibriTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the titolo field.
     *
     * @var        string
     */
    protected $titolo;

    /**
     * The value for the autore1 field.
     *
     * @var        int
     */
    protected $autore1;

    /**
     * The value for the autore2 field.
     *
     * @var        int
     */
    protected $autore2;

    /**
     * The value for the autore3 field.
     *
     * @var        int
     */
    protected $autore3;

    /**
     * The value for the tipo1 field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $tipo1;

    /**
     * The value for the idgenere1 field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idgenere1;

    /**
     * The value for the tipo2 field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $tipo2;

    /**
     * The value for the idgenere2 field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idgenere2;

    /**
     * The value for the tipo3 field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $tipo3;

    /**
     * The value for the idgenere3 field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $idgenere3;

    /**
     * The value for the editore field.
     *
     * @var        string
     */
    protected $editore;

    /**
     * The value for the dati_tecnici field.
     *
     * @var        string
     */
    protected $dati_tecnici;

    /**
     * The value for the diritti_controllati field.
     *
     * @var        string
     */
    protected $diritti_controllati;

    /**
     * The value for the diritti_concessi field.
     *
     * @var        string
     */
    protected $diritti_concessi;

    /**
     * The value for the descrizione_breve field.
     *
     * @var        string
     */
    protected $descrizione_breve;

    /**
     * The value for the descrizione field.
     *
     * @var        string
     */
    protected $descrizione;

    /**
     * The value for the pdf1_ita field.
     *
     * @var        string
     */
    protected $pdf1_ita;

    /**
     * The value for the pdf1_eng field.
     *
     * @var        string
     */
    protected $pdf1_eng;

    /**
     * The value for the pdf1_deu field.
     *
     * @var        string
     */
    protected $pdf1_deu;

    /**
     * The value for the pdf1_fra field.
     *
     * @var        string
     */
    protected $pdf1_fra;

    /**
     * The value for the pdf1_esp field.
     *
     * @var        string
     */
    protected $pdf1_esp;

    /**
     * The value for the pdf2 field.
     *
     * @var        string
     */
    protected $pdf2;

    /**
     * The value for the pdf3 field.
     *
     * @var        string
     */
    protected $pdf3;

    /**
     * The value for the pdf4 field.
     *
     * @var        string
     */
    protected $pdf4;

    /**
     * The value for the img_small field.
     *
     * @var        string
     */
    protected $img_small;

    /**
     * The value for the img_big field.
     *
     * @var        string
     */
    protected $img_big;

    /**
     * The value for the vetrina field.
     *
     * @var        string
     */
    protected $vetrina;

    /**
     * The value for the ordine field.
     *
     * @var        int
     */
    protected $ordine;

    /**
     * The value for the vetrinacat field.
     *
     * @var        string
     */
    protected $vetrinacat;

    /**
     * The value for the ordinecat field.
     *
     * @var        int
     */
    protected $ordinecat;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->tipo1 = 0;
        $this->idgenere1 = 0;
        $this->tipo2 = 0;
        $this->idgenere2 = 0;
        $this->tipo3 = 0;
        $this->idgenere3 = 0;
    }

    /**
     * Initializes internal state of Base\Libri object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Libri</code> instance.  If
     * <code>obj</code> is an instance of <code>Libri</code>, delegates to
     * <code>equals(Libri)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Libri The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [titolo] column value.
     *
     * @return string
     */
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * Get the [autore1] column value.
     *
     * @return int
     */
    public function getAutore1()
    {
        return $this->autore1;
    }

    /**
     * Get the [autore2] column value.
     *
     * @return int
     */
    public function getAutore2()
    {
        return $this->autore2;
    }

    /**
     * Get the [autore3] column value.
     *
     * @return int
     */
    public function getAutore3()
    {
        return $this->autore3;
    }

    /**
     * Get the [tipo1] column value.
     *
     * @return int
     */
    public function getTipo1()
    {
        return $this->tipo1;
    }

    /**
     * Get the [idgenere1] column value.
     *
     * @return int
     */
    public function getIdgenere1()
    {
        return $this->idgenere1;
    }

    /**
     * Get the [tipo2] column value.
     *
     * @return int
     */
    public function getTipo2()
    {
        return $this->tipo2;
    }

    /**
     * Get the [idgenere2] column value.
     *
     * @return int
     */
    public function getIdgenere2()
    {
        return $this->idgenere2;
    }

    /**
     * Get the [tipo3] column value.
     *
     * @return int
     */
    public function getTipo3()
    {
        return $this->tipo3;
    }

    /**
     * Get the [idgenere3] column value.
     *
     * @return int
     */
    public function getIdgenere3()
    {
        return $this->idgenere3;
    }

    /**
     * Get the [editore] column value.
     *
     * @return string
     */
    public function getEditore()
    {
        return $this->editore;
    }

    /**
     * Get the [dati_tecnici] column value.
     *
     * @return string
     */
    public function getDatiTecnici()
    {
        return $this->dati_tecnici;
    }

    /**
     * Get the [diritti_controllati] column value.
     *
     * @return string
     */
    public function getDirittiControllati()
    {
        return $this->diritti_controllati;
    }

    /**
     * Get the [diritti_concessi] column value.
     *
     * @return string
     */
    public function getDirittiConcessi()
    {
        return $this->diritti_concessi;
    }

    /**
     * Get the [descrizione_breve] column value.
     *
     * @return string
     */
    public function getDescrizioneBreve()
    {
        return $this->descrizione_breve;
    }

    /**
     * Get the [descrizione] column value.
     *
     * @return string
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * Get the [pdf1_ita] column value.
     *
     * @return string
     */
    public function getPdf1Ita()
    {
        return $this->pdf1_ita;
    }

    /**
     * Get the [pdf1_eng] column value.
     *
     * @return string
     */
    public function getPdf1Eng()
    {
        return $this->pdf1_eng;
    }

    /**
     * Get the [pdf1_deu] column value.
     *
     * @return string
     */
    public function getPdf1Deu()
    {
        return $this->pdf1_deu;
    }

    /**
     * Get the [pdf1_fra] column value.
     *
     * @return string
     */
    public function getPdf1Fra()
    {
        return $this->pdf1_fra;
    }

    /**
     * Get the [pdf1_esp] column value.
     *
     * @return string
     */
    public function getPdf1Esp()
    {
        return $this->pdf1_esp;
    }

    /**
     * Get the [pdf2] column value.
     *
     * @return string
     */
    public function getPdf2()
    {
        return $this->pdf2;
    }

    /**
     * Get the [pdf3] column value.
     *
     * @return string
     */
    public function getPdf3()
    {
        return $this->pdf3;
    }

    /**
     * Get the [pdf4] column value.
     *
     * @return string
     */
    public function getPdf4()
    {
        return $this->pdf4;
    }

    /**
     * Get the [img_small] column value.
     *
     * @return string
     */
    public function getImgSmall()
    {
        return $this->img_small;
    }

    /**
     * Get the [img_big] column value.
     *
     * @return string
     */
    public function getImgBig()
    {
        return $this->img_big;
    }

    /**
     * Get the [vetrina] column value.
     *
     * @return string
     */
    public function getVetrina()
    {
        return $this->vetrina;
    }

    /**
     * Get the [ordine] column value.
     *
     * @return int
     */
    public function getOrdine()
    {
        return $this->ordine;
    }

    /**
     * Get the [vetrinacat] column value.
     *
     * @return string
     */
    public function getVetrinacat()
    {
        return $this->vetrinacat;
    }

    /**
     * Get the [ordinecat] column value.
     *
     * @return int
     */
    public function getOrdinecat()
    {
        return $this->ordinecat;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[LibriTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [titolo] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setTitolo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->titolo !== $v) {
            $this->titolo = $v;
            $this->modifiedColumns[LibriTableMap::COL_TITOLO] = true;
        }

        return $this;
    } // setTitolo()

    /**
     * Set the value of [autore1] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setAutore1($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->autore1 !== $v) {
            $this->autore1 = $v;
            $this->modifiedColumns[LibriTableMap::COL_AUTORE1] = true;
        }

        return $this;
    } // setAutore1()

    /**
     * Set the value of [autore2] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setAutore2($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->autore2 !== $v) {
            $this->autore2 = $v;
            $this->modifiedColumns[LibriTableMap::COL_AUTORE2] = true;
        }

        return $this;
    } // setAutore2()

    /**
     * Set the value of [autore3] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setAutore3($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->autore3 !== $v) {
            $this->autore3 = $v;
            $this->modifiedColumns[LibriTableMap::COL_AUTORE3] = true;
        }

        return $this;
    } // setAutore3()

    /**
     * Set the value of [tipo1] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setTipo1($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tipo1 !== $v) {
            $this->tipo1 = $v;
            $this->modifiedColumns[LibriTableMap::COL_TIPO1] = true;
        }

        return $this;
    } // setTipo1()

    /**
     * Set the value of [idgenere1] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setIdgenere1($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idgenere1 !== $v) {
            $this->idgenere1 = $v;
            $this->modifiedColumns[LibriTableMap::COL_IDGENERE1] = true;
        }

        return $this;
    } // setIdgenere1()

    /**
     * Set the value of [tipo2] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setTipo2($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tipo2 !== $v) {
            $this->tipo2 = $v;
            $this->modifiedColumns[LibriTableMap::COL_TIPO2] = true;
        }

        return $this;
    } // setTipo2()

    /**
     * Set the value of [idgenere2] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setIdgenere2($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idgenere2 !== $v) {
            $this->idgenere2 = $v;
            $this->modifiedColumns[LibriTableMap::COL_IDGENERE2] = true;
        }

        return $this;
    } // setIdgenere2()

    /**
     * Set the value of [tipo3] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setTipo3($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tipo3 !== $v) {
            $this->tipo3 = $v;
            $this->modifiedColumns[LibriTableMap::COL_TIPO3] = true;
        }

        return $this;
    } // setTipo3()

    /**
     * Set the value of [idgenere3] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setIdgenere3($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idgenere3 !== $v) {
            $this->idgenere3 = $v;
            $this->modifiedColumns[LibriTableMap::COL_IDGENERE3] = true;
        }

        return $this;
    } // setIdgenere3()

    /**
     * Set the value of [editore] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setEditore($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->editore !== $v) {
            $this->editore = $v;
            $this->modifiedColumns[LibriTableMap::COL_EDITORE] = true;
        }

        return $this;
    } // setEditore()

    /**
     * Set the value of [dati_tecnici] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setDatiTecnici($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dati_tecnici !== $v) {
            $this->dati_tecnici = $v;
            $this->modifiedColumns[LibriTableMap::COL_DATI_TECNICI] = true;
        }

        return $this;
    } // setDatiTecnici()

    /**
     * Set the value of [diritti_controllati] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setDirittiControllati($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->diritti_controllati !== $v) {
            $this->diritti_controllati = $v;
            $this->modifiedColumns[LibriTableMap::COL_DIRITTI_CONTROLLATI] = true;
        }

        return $this;
    } // setDirittiControllati()

    /**
     * Set the value of [diritti_concessi] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setDirittiConcessi($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->diritti_concessi !== $v) {
            $this->diritti_concessi = $v;
            $this->modifiedColumns[LibriTableMap::COL_DIRITTI_CONCESSI] = true;
        }

        return $this;
    } // setDirittiConcessi()

    /**
     * Set the value of [descrizione_breve] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setDescrizioneBreve($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descrizione_breve !== $v) {
            $this->descrizione_breve = $v;
            $this->modifiedColumns[LibriTableMap::COL_DESCRIZIONE_BREVE] = true;
        }

        return $this;
    } // setDescrizioneBreve()

    /**
     * Set the value of [descrizione] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setDescrizione($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descrizione !== $v) {
            $this->descrizione = $v;
            $this->modifiedColumns[LibriTableMap::COL_DESCRIZIONE] = true;
        }

        return $this;
    } // setDescrizione()

    /**
     * Set the value of [pdf1_ita] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setPdf1Ita($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdf1_ita !== $v) {
            $this->pdf1_ita = $v;
            $this->modifiedColumns[LibriTableMap::COL_PDF1_ITA] = true;
        }

        return $this;
    } // setPdf1Ita()

    /**
     * Set the value of [pdf1_eng] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setPdf1Eng($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdf1_eng !== $v) {
            $this->pdf1_eng = $v;
            $this->modifiedColumns[LibriTableMap::COL_PDF1_ENG] = true;
        }

        return $this;
    } // setPdf1Eng()

    /**
     * Set the value of [pdf1_deu] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setPdf1Deu($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdf1_deu !== $v) {
            $this->pdf1_deu = $v;
            $this->modifiedColumns[LibriTableMap::COL_PDF1_DEU] = true;
        }

        return $this;
    } // setPdf1Deu()

    /**
     * Set the value of [pdf1_fra] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setPdf1Fra($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdf1_fra !== $v) {
            $this->pdf1_fra = $v;
            $this->modifiedColumns[LibriTableMap::COL_PDF1_FRA] = true;
        }

        return $this;
    } // setPdf1Fra()

    /**
     * Set the value of [pdf1_esp] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setPdf1Esp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdf1_esp !== $v) {
            $this->pdf1_esp = $v;
            $this->modifiedColumns[LibriTableMap::COL_PDF1_ESP] = true;
        }

        return $this;
    } // setPdf1Esp()

    /**
     * Set the value of [pdf2] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setPdf2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdf2 !== $v) {
            $this->pdf2 = $v;
            $this->modifiedColumns[LibriTableMap::COL_PDF2] = true;
        }

        return $this;
    } // setPdf2()

    /**
     * Set the value of [pdf3] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setPdf3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdf3 !== $v) {
            $this->pdf3 = $v;
            $this->modifiedColumns[LibriTableMap::COL_PDF3] = true;
        }

        return $this;
    } // setPdf3()

    /**
     * Set the value of [pdf4] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setPdf4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdf4 !== $v) {
            $this->pdf4 = $v;
            $this->modifiedColumns[LibriTableMap::COL_PDF4] = true;
        }

        return $this;
    } // setPdf4()

    /**
     * Set the value of [img_small] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setImgSmall($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->img_small !== $v) {
            $this->img_small = $v;
            $this->modifiedColumns[LibriTableMap::COL_IMG_SMALL] = true;
        }

        return $this;
    } // setImgSmall()

    /**
     * Set the value of [img_big] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setImgBig($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->img_big !== $v) {
            $this->img_big = $v;
            $this->modifiedColumns[LibriTableMap::COL_IMG_BIG] = true;
        }

        return $this;
    } // setImgBig()

    /**
     * Set the value of [vetrina] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setVetrina($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vetrina !== $v) {
            $this->vetrina = $v;
            $this->modifiedColumns[LibriTableMap::COL_VETRINA] = true;
        }

        return $this;
    } // setVetrina()

    /**
     * Set the value of [ordine] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setOrdine($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ordine !== $v) {
            $this->ordine = $v;
            $this->modifiedColumns[LibriTableMap::COL_ORDINE] = true;
        }

        return $this;
    } // setOrdine()

    /**
     * Set the value of [vetrinacat] column.
     *
     * @param string $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setVetrinacat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vetrinacat !== $v) {
            $this->vetrinacat = $v;
            $this->modifiedColumns[LibriTableMap::COL_VETRINACAT] = true;
        }

        return $this;
    } // setVetrinacat()

    /**
     * Set the value of [ordinecat] column.
     *
     * @param int $v new value
     * @return $this|\Libri The current object (for fluent API support)
     */
    public function setOrdinecat($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ordinecat !== $v) {
            $this->ordinecat = $v;
            $this->modifiedColumns[LibriTableMap::COL_ORDINECAT] = true;
        }

        return $this;
    } // setOrdinecat()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->tipo1 !== 0) {
                return false;
            }

            if ($this->idgenere1 !== 0) {
                return false;
            }

            if ($this->tipo2 !== 0) {
                return false;
            }

            if ($this->idgenere2 !== 0) {
                return false;
            }

            if ($this->tipo3 !== 0) {
                return false;
            }

            if ($this->idgenere3 !== 0) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : LibriTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : LibriTableMap::translateFieldName('Titolo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->titolo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : LibriTableMap::translateFieldName('Autore1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->autore1 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : LibriTableMap::translateFieldName('Autore2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->autore2 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : LibriTableMap::translateFieldName('Autore3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->autore3 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : LibriTableMap::translateFieldName('Tipo1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo1 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : LibriTableMap::translateFieldName('Idgenere1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idgenere1 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : LibriTableMap::translateFieldName('Tipo2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo2 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : LibriTableMap::translateFieldName('Idgenere2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idgenere2 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : LibriTableMap::translateFieldName('Tipo3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo3 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : LibriTableMap::translateFieldName('Idgenere3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idgenere3 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : LibriTableMap::translateFieldName('Editore', TableMap::TYPE_PHPNAME, $indexType)];
            $this->editore = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : LibriTableMap::translateFieldName('DatiTecnici', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dati_tecnici = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : LibriTableMap::translateFieldName('DirittiControllati', TableMap::TYPE_PHPNAME, $indexType)];
            $this->diritti_controllati = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : LibriTableMap::translateFieldName('DirittiConcessi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->diritti_concessi = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : LibriTableMap::translateFieldName('DescrizioneBreve', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descrizione_breve = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : LibriTableMap::translateFieldName('Descrizione', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descrizione = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : LibriTableMap::translateFieldName('Pdf1Ita', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdf1_ita = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : LibriTableMap::translateFieldName('Pdf1Eng', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdf1_eng = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : LibriTableMap::translateFieldName('Pdf1Deu', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdf1_deu = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : LibriTableMap::translateFieldName('Pdf1Fra', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdf1_fra = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : LibriTableMap::translateFieldName('Pdf1Esp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdf1_esp = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : LibriTableMap::translateFieldName('Pdf2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdf2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : LibriTableMap::translateFieldName('Pdf3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdf3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : LibriTableMap::translateFieldName('Pdf4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdf4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : LibriTableMap::translateFieldName('ImgSmall', TableMap::TYPE_PHPNAME, $indexType)];
            $this->img_small = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : LibriTableMap::translateFieldName('ImgBig', TableMap::TYPE_PHPNAME, $indexType)];
            $this->img_big = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : LibriTableMap::translateFieldName('Vetrina', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vetrina = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : LibriTableMap::translateFieldName('Ordine', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordine = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : LibriTableMap::translateFieldName('Vetrinacat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vetrinacat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : LibriTableMap::translateFieldName('Ordinecat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordinecat = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 31; // 31 = LibriTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Libri'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LibriTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildLibriQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Libri::setDeleted()
     * @see Libri::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(LibriTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildLibriQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(LibriTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                LibriTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[LibriTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . LibriTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(LibriTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(LibriTableMap::COL_TITOLO)) {
            $modifiedColumns[':p' . $index++]  = 'titolo';
        }
        if ($this->isColumnModified(LibriTableMap::COL_AUTORE1)) {
            $modifiedColumns[':p' . $index++]  = 'autore1';
        }
        if ($this->isColumnModified(LibriTableMap::COL_AUTORE2)) {
            $modifiedColumns[':p' . $index++]  = 'autore2';
        }
        if ($this->isColumnModified(LibriTableMap::COL_AUTORE3)) {
            $modifiedColumns[':p' . $index++]  = 'autore3';
        }
        if ($this->isColumnModified(LibriTableMap::COL_TIPO1)) {
            $modifiedColumns[':p' . $index++]  = 'tipo1';
        }
        if ($this->isColumnModified(LibriTableMap::COL_IDGENERE1)) {
            $modifiedColumns[':p' . $index++]  = 'IDgenere1';
        }
        if ($this->isColumnModified(LibriTableMap::COL_TIPO2)) {
            $modifiedColumns[':p' . $index++]  = 'tipo2';
        }
        if ($this->isColumnModified(LibriTableMap::COL_IDGENERE2)) {
            $modifiedColumns[':p' . $index++]  = 'IDgenere2';
        }
        if ($this->isColumnModified(LibriTableMap::COL_TIPO3)) {
            $modifiedColumns[':p' . $index++]  = 'tipo3';
        }
        if ($this->isColumnModified(LibriTableMap::COL_IDGENERE3)) {
            $modifiedColumns[':p' . $index++]  = 'IDgenere3';
        }
        if ($this->isColumnModified(LibriTableMap::COL_EDITORE)) {
            $modifiedColumns[':p' . $index++]  = 'editore';
        }
        if ($this->isColumnModified(LibriTableMap::COL_DATI_TECNICI)) {
            $modifiedColumns[':p' . $index++]  = 'dati_tecnici';
        }
        if ($this->isColumnModified(LibriTableMap::COL_DIRITTI_CONTROLLATI)) {
            $modifiedColumns[':p' . $index++]  = 'diritti_controllati';
        }
        if ($this->isColumnModified(LibriTableMap::COL_DIRITTI_CONCESSI)) {
            $modifiedColumns[':p' . $index++]  = 'diritti_concessi';
        }
        if ($this->isColumnModified(LibriTableMap::COL_DESCRIZIONE_BREVE)) {
            $modifiedColumns[':p' . $index++]  = 'descrizione_breve';
        }
        if ($this->isColumnModified(LibriTableMap::COL_DESCRIZIONE)) {
            $modifiedColumns[':p' . $index++]  = 'descrizione';
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_ITA)) {
            $modifiedColumns[':p' . $index++]  = 'pdf1_ita';
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_ENG)) {
            $modifiedColumns[':p' . $index++]  = 'pdf1_eng';
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_DEU)) {
            $modifiedColumns[':p' . $index++]  = 'pdf1_deu';
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_FRA)) {
            $modifiedColumns[':p' . $index++]  = 'pdf1_fra';
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_ESP)) {
            $modifiedColumns[':p' . $index++]  = 'pdf1_esp';
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF2)) {
            $modifiedColumns[':p' . $index++]  = 'pdf2';
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF3)) {
            $modifiedColumns[':p' . $index++]  = 'pdf3';
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF4)) {
            $modifiedColumns[':p' . $index++]  = 'pdf4';
        }
        if ($this->isColumnModified(LibriTableMap::COL_IMG_SMALL)) {
            $modifiedColumns[':p' . $index++]  = 'img_small';
        }
        if ($this->isColumnModified(LibriTableMap::COL_IMG_BIG)) {
            $modifiedColumns[':p' . $index++]  = 'img_big';
        }
        if ($this->isColumnModified(LibriTableMap::COL_VETRINA)) {
            $modifiedColumns[':p' . $index++]  = 'vetrina';
        }
        if ($this->isColumnModified(LibriTableMap::COL_ORDINE)) {
            $modifiedColumns[':p' . $index++]  = 'ordine';
        }
        if ($this->isColumnModified(LibriTableMap::COL_VETRINACAT)) {
            $modifiedColumns[':p' . $index++]  = 'vetrinacat';
        }
        if ($this->isColumnModified(LibriTableMap::COL_ORDINECAT)) {
            $modifiedColumns[':p' . $index++]  = 'ordinecat';
        }

        $sql = sprintf(
            'INSERT INTO libri (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ID':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'titolo':
                        $stmt->bindValue($identifier, $this->titolo, PDO::PARAM_STR);
                        break;
                    case 'autore1':
                        $stmt->bindValue($identifier, $this->autore1, PDO::PARAM_INT);
                        break;
                    case 'autore2':
                        $stmt->bindValue($identifier, $this->autore2, PDO::PARAM_INT);
                        break;
                    case 'autore3':
                        $stmt->bindValue($identifier, $this->autore3, PDO::PARAM_INT);
                        break;
                    case 'tipo1':
                        $stmt->bindValue($identifier, $this->tipo1, PDO::PARAM_INT);
                        break;
                    case 'IDgenere1':
                        $stmt->bindValue($identifier, $this->idgenere1, PDO::PARAM_INT);
                        break;
                    case 'tipo2':
                        $stmt->bindValue($identifier, $this->tipo2, PDO::PARAM_INT);
                        break;
                    case 'IDgenere2':
                        $stmt->bindValue($identifier, $this->idgenere2, PDO::PARAM_INT);
                        break;
                    case 'tipo3':
                        $stmt->bindValue($identifier, $this->tipo3, PDO::PARAM_INT);
                        break;
                    case 'IDgenere3':
                        $stmt->bindValue($identifier, $this->idgenere3, PDO::PARAM_INT);
                        break;
                    case 'editore':
                        $stmt->bindValue($identifier, $this->editore, PDO::PARAM_STR);
                        break;
                    case 'dati_tecnici':
                        $stmt->bindValue($identifier, $this->dati_tecnici, PDO::PARAM_STR);
                        break;
                    case 'diritti_controllati':
                        $stmt->bindValue($identifier, $this->diritti_controllati, PDO::PARAM_STR);
                        break;
                    case 'diritti_concessi':
                        $stmt->bindValue($identifier, $this->diritti_concessi, PDO::PARAM_STR);
                        break;
                    case 'descrizione_breve':
                        $stmt->bindValue($identifier, $this->descrizione_breve, PDO::PARAM_STR);
                        break;
                    case 'descrizione':
                        $stmt->bindValue($identifier, $this->descrizione, PDO::PARAM_STR);
                        break;
                    case 'pdf1_ita':
                        $stmt->bindValue($identifier, $this->pdf1_ita, PDO::PARAM_STR);
                        break;
                    case 'pdf1_eng':
                        $stmt->bindValue($identifier, $this->pdf1_eng, PDO::PARAM_STR);
                        break;
                    case 'pdf1_deu':
                        $stmt->bindValue($identifier, $this->pdf1_deu, PDO::PARAM_STR);
                        break;
                    case 'pdf1_fra':
                        $stmt->bindValue($identifier, $this->pdf1_fra, PDO::PARAM_STR);
                        break;
                    case 'pdf1_esp':
                        $stmt->bindValue($identifier, $this->pdf1_esp, PDO::PARAM_STR);
                        break;
                    case 'pdf2':
                        $stmt->bindValue($identifier, $this->pdf2, PDO::PARAM_STR);
                        break;
                    case 'pdf3':
                        $stmt->bindValue($identifier, $this->pdf3, PDO::PARAM_STR);
                        break;
                    case 'pdf4':
                        $stmt->bindValue($identifier, $this->pdf4, PDO::PARAM_STR);
                        break;
                    case 'img_small':
                        $stmt->bindValue($identifier, $this->img_small, PDO::PARAM_STR);
                        break;
                    case 'img_big':
                        $stmt->bindValue($identifier, $this->img_big, PDO::PARAM_STR);
                        break;
                    case 'vetrina':
                        $stmt->bindValue($identifier, $this->vetrina, PDO::PARAM_STR);
                        break;
                    case 'ordine':
                        $stmt->bindValue($identifier, $this->ordine, PDO::PARAM_INT);
                        break;
                    case 'vetrinacat':
                        $stmt->bindValue($identifier, $this->vetrinacat, PDO::PARAM_STR);
                        break;
                    case 'ordinecat':
                        $stmt->bindValue($identifier, $this->ordinecat, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = LibriTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getTitolo();
                break;
            case 2:
                return $this->getAutore1();
                break;
            case 3:
                return $this->getAutore2();
                break;
            case 4:
                return $this->getAutore3();
                break;
            case 5:
                return $this->getTipo1();
                break;
            case 6:
                return $this->getIdgenere1();
                break;
            case 7:
                return $this->getTipo2();
                break;
            case 8:
                return $this->getIdgenere2();
                break;
            case 9:
                return $this->getTipo3();
                break;
            case 10:
                return $this->getIdgenere3();
                break;
            case 11:
                return $this->getEditore();
                break;
            case 12:
                return $this->getDatiTecnici();
                break;
            case 13:
                return $this->getDirittiControllati();
                break;
            case 14:
                return $this->getDirittiConcessi();
                break;
            case 15:
                return $this->getDescrizioneBreve();
                break;
            case 16:
                return $this->getDescrizione();
                break;
            case 17:
                return $this->getPdf1Ita();
                break;
            case 18:
                return $this->getPdf1Eng();
                break;
            case 19:
                return $this->getPdf1Deu();
                break;
            case 20:
                return $this->getPdf1Fra();
                break;
            case 21:
                return $this->getPdf1Esp();
                break;
            case 22:
                return $this->getPdf2();
                break;
            case 23:
                return $this->getPdf3();
                break;
            case 24:
                return $this->getPdf4();
                break;
            case 25:
                return $this->getImgSmall();
                break;
            case 26:
                return $this->getImgBig();
                break;
            case 27:
                return $this->getVetrina();
                break;
            case 28:
                return $this->getOrdine();
                break;
            case 29:
                return $this->getVetrinacat();
                break;
            case 30:
                return $this->getOrdinecat();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Libri'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Libri'][$this->hashCode()] = true;
        $keys = LibriTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTitolo(),
            $keys[2] => $this->getAutore1(),
            $keys[3] => $this->getAutore2(),
            $keys[4] => $this->getAutore3(),
            $keys[5] => $this->getTipo1(),
            $keys[6] => $this->getIdgenere1(),
            $keys[7] => $this->getTipo2(),
            $keys[8] => $this->getIdgenere2(),
            $keys[9] => $this->getTipo3(),
            $keys[10] => $this->getIdgenere3(),
            $keys[11] => $this->getEditore(),
            $keys[12] => $this->getDatiTecnici(),
            $keys[13] => $this->getDirittiControllati(),
            $keys[14] => $this->getDirittiConcessi(),
            $keys[15] => $this->getDescrizioneBreve(),
            $keys[16] => $this->getDescrizione(),
            $keys[17] => $this->getPdf1Ita(),
            $keys[18] => $this->getPdf1Eng(),
            $keys[19] => $this->getPdf1Deu(),
            $keys[20] => $this->getPdf1Fra(),
            $keys[21] => $this->getPdf1Esp(),
            $keys[22] => $this->getPdf2(),
            $keys[23] => $this->getPdf3(),
            $keys[24] => $this->getPdf4(),
            $keys[25] => $this->getImgSmall(),
            $keys[26] => $this->getImgBig(),
            $keys[27] => $this->getVetrina(),
            $keys[28] => $this->getOrdine(),
            $keys[29] => $this->getVetrinacat(),
            $keys[30] => $this->getOrdinecat(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Libri
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = LibriTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Libri
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setTitolo($value);
                break;
            case 2:
                $this->setAutore1($value);
                break;
            case 3:
                $this->setAutore2($value);
                break;
            case 4:
                $this->setAutore3($value);
                break;
            case 5:
                $this->setTipo1($value);
                break;
            case 6:
                $this->setIdgenere1($value);
                break;
            case 7:
                $this->setTipo2($value);
                break;
            case 8:
                $this->setIdgenere2($value);
                break;
            case 9:
                $this->setTipo3($value);
                break;
            case 10:
                $this->setIdgenere3($value);
                break;
            case 11:
                $this->setEditore($value);
                break;
            case 12:
                $this->setDatiTecnici($value);
                break;
            case 13:
                $this->setDirittiControllati($value);
                break;
            case 14:
                $this->setDirittiConcessi($value);
                break;
            case 15:
                $this->setDescrizioneBreve($value);
                break;
            case 16:
                $this->setDescrizione($value);
                break;
            case 17:
                $this->setPdf1Ita($value);
                break;
            case 18:
                $this->setPdf1Eng($value);
                break;
            case 19:
                $this->setPdf1Deu($value);
                break;
            case 20:
                $this->setPdf1Fra($value);
                break;
            case 21:
                $this->setPdf1Esp($value);
                break;
            case 22:
                $this->setPdf2($value);
                break;
            case 23:
                $this->setPdf3($value);
                break;
            case 24:
                $this->setPdf4($value);
                break;
            case 25:
                $this->setImgSmall($value);
                break;
            case 26:
                $this->setImgBig($value);
                break;
            case 27:
                $this->setVetrina($value);
                break;
            case 28:
                $this->setOrdine($value);
                break;
            case 29:
                $this->setVetrinacat($value);
                break;
            case 30:
                $this->setOrdinecat($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = LibriTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTitolo($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAutore1($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAutore2($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setAutore3($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTipo1($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setIdgenere1($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTipo2($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setIdgenere2($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTipo3($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setIdgenere3($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setEditore($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setDatiTecnici($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setDirittiControllati($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setDirittiConcessi($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDescrizioneBreve($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDescrizione($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setPdf1Ita($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setPdf1Eng($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setPdf1Deu($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setPdf1Fra($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setPdf1Esp($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setPdf2($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setPdf3($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setPdf4($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setImgSmall($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setImgBig($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setVetrina($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setOrdine($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setVetrinacat($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setOrdinecat($arr[$keys[30]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Libri The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(LibriTableMap::DATABASE_NAME);

        if ($this->isColumnModified(LibriTableMap::COL_ID)) {
            $criteria->add(LibriTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(LibriTableMap::COL_TITOLO)) {
            $criteria->add(LibriTableMap::COL_TITOLO, $this->titolo);
        }
        if ($this->isColumnModified(LibriTableMap::COL_AUTORE1)) {
            $criteria->add(LibriTableMap::COL_AUTORE1, $this->autore1);
        }
        if ($this->isColumnModified(LibriTableMap::COL_AUTORE2)) {
            $criteria->add(LibriTableMap::COL_AUTORE2, $this->autore2);
        }
        if ($this->isColumnModified(LibriTableMap::COL_AUTORE3)) {
            $criteria->add(LibriTableMap::COL_AUTORE3, $this->autore3);
        }
        if ($this->isColumnModified(LibriTableMap::COL_TIPO1)) {
            $criteria->add(LibriTableMap::COL_TIPO1, $this->tipo1);
        }
        if ($this->isColumnModified(LibriTableMap::COL_IDGENERE1)) {
            $criteria->add(LibriTableMap::COL_IDGENERE1, $this->idgenere1);
        }
        if ($this->isColumnModified(LibriTableMap::COL_TIPO2)) {
            $criteria->add(LibriTableMap::COL_TIPO2, $this->tipo2);
        }
        if ($this->isColumnModified(LibriTableMap::COL_IDGENERE2)) {
            $criteria->add(LibriTableMap::COL_IDGENERE2, $this->idgenere2);
        }
        if ($this->isColumnModified(LibriTableMap::COL_TIPO3)) {
            $criteria->add(LibriTableMap::COL_TIPO3, $this->tipo3);
        }
        if ($this->isColumnModified(LibriTableMap::COL_IDGENERE3)) {
            $criteria->add(LibriTableMap::COL_IDGENERE3, $this->idgenere3);
        }
        if ($this->isColumnModified(LibriTableMap::COL_EDITORE)) {
            $criteria->add(LibriTableMap::COL_EDITORE, $this->editore);
        }
        if ($this->isColumnModified(LibriTableMap::COL_DATI_TECNICI)) {
            $criteria->add(LibriTableMap::COL_DATI_TECNICI, $this->dati_tecnici);
        }
        if ($this->isColumnModified(LibriTableMap::COL_DIRITTI_CONTROLLATI)) {
            $criteria->add(LibriTableMap::COL_DIRITTI_CONTROLLATI, $this->diritti_controllati);
        }
        if ($this->isColumnModified(LibriTableMap::COL_DIRITTI_CONCESSI)) {
            $criteria->add(LibriTableMap::COL_DIRITTI_CONCESSI, $this->diritti_concessi);
        }
        if ($this->isColumnModified(LibriTableMap::COL_DESCRIZIONE_BREVE)) {
            $criteria->add(LibriTableMap::COL_DESCRIZIONE_BREVE, $this->descrizione_breve);
        }
        if ($this->isColumnModified(LibriTableMap::COL_DESCRIZIONE)) {
            $criteria->add(LibriTableMap::COL_DESCRIZIONE, $this->descrizione);
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_ITA)) {
            $criteria->add(LibriTableMap::COL_PDF1_ITA, $this->pdf1_ita);
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_ENG)) {
            $criteria->add(LibriTableMap::COL_PDF1_ENG, $this->pdf1_eng);
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_DEU)) {
            $criteria->add(LibriTableMap::COL_PDF1_DEU, $this->pdf1_deu);
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_FRA)) {
            $criteria->add(LibriTableMap::COL_PDF1_FRA, $this->pdf1_fra);
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF1_ESP)) {
            $criteria->add(LibriTableMap::COL_PDF1_ESP, $this->pdf1_esp);
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF2)) {
            $criteria->add(LibriTableMap::COL_PDF2, $this->pdf2);
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF3)) {
            $criteria->add(LibriTableMap::COL_PDF3, $this->pdf3);
        }
        if ($this->isColumnModified(LibriTableMap::COL_PDF4)) {
            $criteria->add(LibriTableMap::COL_PDF4, $this->pdf4);
        }
        if ($this->isColumnModified(LibriTableMap::COL_IMG_SMALL)) {
            $criteria->add(LibriTableMap::COL_IMG_SMALL, $this->img_small);
        }
        if ($this->isColumnModified(LibriTableMap::COL_IMG_BIG)) {
            $criteria->add(LibriTableMap::COL_IMG_BIG, $this->img_big);
        }
        if ($this->isColumnModified(LibriTableMap::COL_VETRINA)) {
            $criteria->add(LibriTableMap::COL_VETRINA, $this->vetrina);
        }
        if ($this->isColumnModified(LibriTableMap::COL_ORDINE)) {
            $criteria->add(LibriTableMap::COL_ORDINE, $this->ordine);
        }
        if ($this->isColumnModified(LibriTableMap::COL_VETRINACAT)) {
            $criteria->add(LibriTableMap::COL_VETRINACAT, $this->vetrinacat);
        }
        if ($this->isColumnModified(LibriTableMap::COL_ORDINECAT)) {
            $criteria->add(LibriTableMap::COL_ORDINECAT, $this->ordinecat);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildLibriQuery::create();
        $criteria->add(LibriTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Libri (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitolo($this->getTitolo());
        $copyObj->setAutore1($this->getAutore1());
        $copyObj->setAutore2($this->getAutore2());
        $copyObj->setAutore3($this->getAutore3());
        $copyObj->setTipo1($this->getTipo1());
        $copyObj->setIdgenere1($this->getIdgenere1());
        $copyObj->setTipo2($this->getTipo2());
        $copyObj->setIdgenere2($this->getIdgenere2());
        $copyObj->setTipo3($this->getTipo3());
        $copyObj->setIdgenere3($this->getIdgenere3());
        $copyObj->setEditore($this->getEditore());
        $copyObj->setDatiTecnici($this->getDatiTecnici());
        $copyObj->setDirittiControllati($this->getDirittiControllati());
        $copyObj->setDirittiConcessi($this->getDirittiConcessi());
        $copyObj->setDescrizioneBreve($this->getDescrizioneBreve());
        $copyObj->setDescrizione($this->getDescrizione());
        $copyObj->setPdf1Ita($this->getPdf1Ita());
        $copyObj->setPdf1Eng($this->getPdf1Eng());
        $copyObj->setPdf1Deu($this->getPdf1Deu());
        $copyObj->setPdf1Fra($this->getPdf1Fra());
        $copyObj->setPdf1Esp($this->getPdf1Esp());
        $copyObj->setPdf2($this->getPdf2());
        $copyObj->setPdf3($this->getPdf3());
        $copyObj->setPdf4($this->getPdf4());
        $copyObj->setImgSmall($this->getImgSmall());
        $copyObj->setImgBig($this->getImgBig());
        $copyObj->setVetrina($this->getVetrina());
        $copyObj->setOrdine($this->getOrdine());
        $copyObj->setVetrinacat($this->getVetrinacat());
        $copyObj->setOrdinecat($this->getOrdinecat());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Libri Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->titolo = null;
        $this->autore1 = null;
        $this->autore2 = null;
        $this->autore3 = null;
        $this->tipo1 = null;
        $this->idgenere1 = null;
        $this->tipo2 = null;
        $this->idgenere2 = null;
        $this->tipo3 = null;
        $this->idgenere3 = null;
        $this->editore = null;
        $this->dati_tecnici = null;
        $this->diritti_controllati = null;
        $this->diritti_concessi = null;
        $this->descrizione_breve = null;
        $this->descrizione = null;
        $this->pdf1_ita = null;
        $this->pdf1_eng = null;
        $this->pdf1_deu = null;
        $this->pdf1_fra = null;
        $this->pdf1_esp = null;
        $this->pdf2 = null;
        $this->pdf3 = null;
        $this->pdf4 = null;
        $this->img_small = null;
        $this->img_big = null;
        $this->vetrina = null;
        $this->ordine = null;
        $this->vetrinacat = null;
        $this->ordinecat = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(LibriTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
