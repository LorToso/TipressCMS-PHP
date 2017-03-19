<?php

namespace Base;

use \Libri as ChildLibri;
use \LibriQuery as ChildLibriQuery;
use \Exception;
use \PDO;
use Map\LibriTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'libri' table.
 *
 *
 *
 * @method     ChildLibriQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildLibriQuery orderByTitolo($order = Criteria::ASC) Order by the titolo column
 * @method     ChildLibriQuery orderByAutore1($order = Criteria::ASC) Order by the autore1 column
 * @method     ChildLibriQuery orderByAutore2($order = Criteria::ASC) Order by the autore2 column
 * @method     ChildLibriQuery orderByAutore3($order = Criteria::ASC) Order by the autore3 column
 * @method     ChildLibriQuery orderByTipo1($order = Criteria::ASC) Order by the tipo1 column
 * @method     ChildLibriQuery orderByIdgenere1($order = Criteria::ASC) Order by the IDgenere1 column
 * @method     ChildLibriQuery orderByTipo2($order = Criteria::ASC) Order by the tipo2 column
 * @method     ChildLibriQuery orderByIdgenere2($order = Criteria::ASC) Order by the IDgenere2 column
 * @method     ChildLibriQuery orderByTipo3($order = Criteria::ASC) Order by the tipo3 column
 * @method     ChildLibriQuery orderByIdgenere3($order = Criteria::ASC) Order by the IDgenere3 column
 * @method     ChildLibriQuery orderByEditore($order = Criteria::ASC) Order by the editore column
 * @method     ChildLibriQuery orderByDatiTecnici($order = Criteria::ASC) Order by the dati_tecnici column
 * @method     ChildLibriQuery orderByDirittiControllati($order = Criteria::ASC) Order by the diritti_controllati column
 * @method     ChildLibriQuery orderByDirittiConcessi($order = Criteria::ASC) Order by the diritti_concessi column
 * @method     ChildLibriQuery orderByDescrizioneBreve($order = Criteria::ASC) Order by the descrizione_breve column
 * @method     ChildLibriQuery orderByDescrizione($order = Criteria::ASC) Order by the descrizione column
 * @method     ChildLibriQuery orderByPdf1Ita($order = Criteria::ASC) Order by the pdf1_ita column
 * @method     ChildLibriQuery orderByPdf1Eng($order = Criteria::ASC) Order by the pdf1_eng column
 * @method     ChildLibriQuery orderByPdf1Deu($order = Criteria::ASC) Order by the pdf1_deu column
 * @method     ChildLibriQuery orderByPdf1Fra($order = Criteria::ASC) Order by the pdf1_fra column
 * @method     ChildLibriQuery orderByPdf1Esp($order = Criteria::ASC) Order by the pdf1_esp column
 * @method     ChildLibriQuery orderByPdf2($order = Criteria::ASC) Order by the pdf2 column
 * @method     ChildLibriQuery orderByPdf3($order = Criteria::ASC) Order by the pdf3 column
 * @method     ChildLibriQuery orderByPdf4($order = Criteria::ASC) Order by the pdf4 column
 * @method     ChildLibriQuery orderByImgSmall($order = Criteria::ASC) Order by the img_small column
 * @method     ChildLibriQuery orderByImgBig($order = Criteria::ASC) Order by the img_big column
 * @method     ChildLibriQuery orderByVetrina($order = Criteria::ASC) Order by the vetrina column
 * @method     ChildLibriQuery orderByOrdine($order = Criteria::ASC) Order by the ordine column
 * @method     ChildLibriQuery orderByVetrinacat($order = Criteria::ASC) Order by the vetrinacat column
 * @method     ChildLibriQuery orderByOrdinecat($order = Criteria::ASC) Order by the ordinecat column
 *
 * @method     ChildLibriQuery groupById() Group by the ID column
 * @method     ChildLibriQuery groupByTitolo() Group by the titolo column
 * @method     ChildLibriQuery groupByAutore1() Group by the autore1 column
 * @method     ChildLibriQuery groupByAutore2() Group by the autore2 column
 * @method     ChildLibriQuery groupByAutore3() Group by the autore3 column
 * @method     ChildLibriQuery groupByTipo1() Group by the tipo1 column
 * @method     ChildLibriQuery groupByIdgenere1() Group by the IDgenere1 column
 * @method     ChildLibriQuery groupByTipo2() Group by the tipo2 column
 * @method     ChildLibriQuery groupByIdgenere2() Group by the IDgenere2 column
 * @method     ChildLibriQuery groupByTipo3() Group by the tipo3 column
 * @method     ChildLibriQuery groupByIdgenere3() Group by the IDgenere3 column
 * @method     ChildLibriQuery groupByEditore() Group by the editore column
 * @method     ChildLibriQuery groupByDatiTecnici() Group by the dati_tecnici column
 * @method     ChildLibriQuery groupByDirittiControllati() Group by the diritti_controllati column
 * @method     ChildLibriQuery groupByDirittiConcessi() Group by the diritti_concessi column
 * @method     ChildLibriQuery groupByDescrizioneBreve() Group by the descrizione_breve column
 * @method     ChildLibriQuery groupByDescrizione() Group by the descrizione column
 * @method     ChildLibriQuery groupByPdf1Ita() Group by the pdf1_ita column
 * @method     ChildLibriQuery groupByPdf1Eng() Group by the pdf1_eng column
 * @method     ChildLibriQuery groupByPdf1Deu() Group by the pdf1_deu column
 * @method     ChildLibriQuery groupByPdf1Fra() Group by the pdf1_fra column
 * @method     ChildLibriQuery groupByPdf1Esp() Group by the pdf1_esp column
 * @method     ChildLibriQuery groupByPdf2() Group by the pdf2 column
 * @method     ChildLibriQuery groupByPdf3() Group by the pdf3 column
 * @method     ChildLibriQuery groupByPdf4() Group by the pdf4 column
 * @method     ChildLibriQuery groupByImgSmall() Group by the img_small column
 * @method     ChildLibriQuery groupByImgBig() Group by the img_big column
 * @method     ChildLibriQuery groupByVetrina() Group by the vetrina column
 * @method     ChildLibriQuery groupByOrdine() Group by the ordine column
 * @method     ChildLibriQuery groupByVetrinacat() Group by the vetrinacat column
 * @method     ChildLibriQuery groupByOrdinecat() Group by the ordinecat column
 *
 * @method     ChildLibriQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLibriQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLibriQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLibriQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLibriQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLibriQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLibri findOne(ConnectionInterface $con = null) Return the first ChildLibri matching the query
 * @method     ChildLibri findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLibri matching the query, or a new ChildLibri object populated from the query conditions when no match is found
 *
 * @method     ChildLibri findOneById(int $ID) Return the first ChildLibri filtered by the ID column
 * @method     ChildLibri findOneByTitolo(string $titolo) Return the first ChildLibri filtered by the titolo column
 * @method     ChildLibri findOneByAutore1(int $autore1) Return the first ChildLibri filtered by the autore1 column
 * @method     ChildLibri findOneByAutore2(int $autore2) Return the first ChildLibri filtered by the autore2 column
 * @method     ChildLibri findOneByAutore3(int $autore3) Return the first ChildLibri filtered by the autore3 column
 * @method     ChildLibri findOneByTipo1(int $tipo1) Return the first ChildLibri filtered by the tipo1 column
 * @method     ChildLibri findOneByIdgenere1(int $IDgenere1) Return the first ChildLibri filtered by the IDgenere1 column
 * @method     ChildLibri findOneByTipo2(int $tipo2) Return the first ChildLibri filtered by the tipo2 column
 * @method     ChildLibri findOneByIdgenere2(int $IDgenere2) Return the first ChildLibri filtered by the IDgenere2 column
 * @method     ChildLibri findOneByTipo3(int $tipo3) Return the first ChildLibri filtered by the tipo3 column
 * @method     ChildLibri findOneByIdgenere3(int $IDgenere3) Return the first ChildLibri filtered by the IDgenere3 column
 * @method     ChildLibri findOneByEditore(string $editore) Return the first ChildLibri filtered by the editore column
 * @method     ChildLibri findOneByDatiTecnici(string $dati_tecnici) Return the first ChildLibri filtered by the dati_tecnici column
 * @method     ChildLibri findOneByDirittiControllati(string $diritti_controllati) Return the first ChildLibri filtered by the diritti_controllati column
 * @method     ChildLibri findOneByDirittiConcessi(string $diritti_concessi) Return the first ChildLibri filtered by the diritti_concessi column
 * @method     ChildLibri findOneByDescrizioneBreve(string $descrizione_breve) Return the first ChildLibri filtered by the descrizione_breve column
 * @method     ChildLibri findOneByDescrizione(string $descrizione) Return the first ChildLibri filtered by the descrizione column
 * @method     ChildLibri findOneByPdf1Ita(string $pdf1_ita) Return the first ChildLibri filtered by the pdf1_ita column
 * @method     ChildLibri findOneByPdf1Eng(string $pdf1_eng) Return the first ChildLibri filtered by the pdf1_eng column
 * @method     ChildLibri findOneByPdf1Deu(string $pdf1_deu) Return the first ChildLibri filtered by the pdf1_deu column
 * @method     ChildLibri findOneByPdf1Fra(string $pdf1_fra) Return the first ChildLibri filtered by the pdf1_fra column
 * @method     ChildLibri findOneByPdf1Esp(string $pdf1_esp) Return the first ChildLibri filtered by the pdf1_esp column
 * @method     ChildLibri findOneByPdf2(string $pdf2) Return the first ChildLibri filtered by the pdf2 column
 * @method     ChildLibri findOneByPdf3(string $pdf3) Return the first ChildLibri filtered by the pdf3 column
 * @method     ChildLibri findOneByPdf4(string $pdf4) Return the first ChildLibri filtered by the pdf4 column
 * @method     ChildLibri findOneByImgSmall(string $img_small) Return the first ChildLibri filtered by the img_small column
 * @method     ChildLibri findOneByImgBig(string $img_big) Return the first ChildLibri filtered by the img_big column
 * @method     ChildLibri findOneByVetrina(string $vetrina) Return the first ChildLibri filtered by the vetrina column
 * @method     ChildLibri findOneByOrdine(int $ordine) Return the first ChildLibri filtered by the ordine column
 * @method     ChildLibri findOneByVetrinacat(string $vetrinacat) Return the first ChildLibri filtered by the vetrinacat column
 * @method     ChildLibri findOneByOrdinecat(int $ordinecat) Return the first ChildLibri filtered by the ordinecat column *

 * @method     ChildLibri requirePk($key, ConnectionInterface $con = null) Return the ChildLibri by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOne(ConnectionInterface $con = null) Return the first ChildLibri matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLibri requireOneById(int $ID) Return the first ChildLibri filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByTitolo(string $titolo) Return the first ChildLibri filtered by the titolo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByAutore1(int $autore1) Return the first ChildLibri filtered by the autore1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByAutore2(int $autore2) Return the first ChildLibri filtered by the autore2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByAutore3(int $autore3) Return the first ChildLibri filtered by the autore3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByTipo1(int $tipo1) Return the first ChildLibri filtered by the tipo1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByIdgenere1(int $IDgenere1) Return the first ChildLibri filtered by the IDgenere1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByTipo2(int $tipo2) Return the first ChildLibri filtered by the tipo2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByIdgenere2(int $IDgenere2) Return the first ChildLibri filtered by the IDgenere2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByTipo3(int $tipo3) Return the first ChildLibri filtered by the tipo3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByIdgenere3(int $IDgenere3) Return the first ChildLibri filtered by the IDgenere3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByEditore(string $editore) Return the first ChildLibri filtered by the editore column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByDatiTecnici(string $dati_tecnici) Return the first ChildLibri filtered by the dati_tecnici column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByDirittiControllati(string $diritti_controllati) Return the first ChildLibri filtered by the diritti_controllati column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByDirittiConcessi(string $diritti_concessi) Return the first ChildLibri filtered by the diritti_concessi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByDescrizioneBreve(string $descrizione_breve) Return the first ChildLibri filtered by the descrizione_breve column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByDescrizione(string $descrizione) Return the first ChildLibri filtered by the descrizione column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByPdf1Ita(string $pdf1_ita) Return the first ChildLibri filtered by the pdf1_ita column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByPdf1Eng(string $pdf1_eng) Return the first ChildLibri filtered by the pdf1_eng column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByPdf1Deu(string $pdf1_deu) Return the first ChildLibri filtered by the pdf1_deu column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByPdf1Fra(string $pdf1_fra) Return the first ChildLibri filtered by the pdf1_fra column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByPdf1Esp(string $pdf1_esp) Return the first ChildLibri filtered by the pdf1_esp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByPdf2(string $pdf2) Return the first ChildLibri filtered by the pdf2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByPdf3(string $pdf3) Return the first ChildLibri filtered by the pdf3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByPdf4(string $pdf4) Return the first ChildLibri filtered by the pdf4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByImgSmall(string $img_small) Return the first ChildLibri filtered by the img_small column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByImgBig(string $img_big) Return the first ChildLibri filtered by the img_big column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByVetrina(string $vetrina) Return the first ChildLibri filtered by the vetrina column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByOrdine(int $ordine) Return the first ChildLibri filtered by the ordine column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByVetrinacat(string $vetrinacat) Return the first ChildLibri filtered by the vetrinacat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLibri requireOneByOrdinecat(int $ordinecat) Return the first ChildLibri filtered by the ordinecat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLibri[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLibri objects based on current ModelCriteria
 * @method     ChildLibri[]|ObjectCollection findById(int $ID) Return ChildLibri objects filtered by the ID column
 * @method     ChildLibri[]|ObjectCollection findByTitolo(string $titolo) Return ChildLibri objects filtered by the titolo column
 * @method     ChildLibri[]|ObjectCollection findByAutore1(int $autore1) Return ChildLibri objects filtered by the autore1 column
 * @method     ChildLibri[]|ObjectCollection findByAutore2(int $autore2) Return ChildLibri objects filtered by the autore2 column
 * @method     ChildLibri[]|ObjectCollection findByAutore3(int $autore3) Return ChildLibri objects filtered by the autore3 column
 * @method     ChildLibri[]|ObjectCollection findByTipo1(int $tipo1) Return ChildLibri objects filtered by the tipo1 column
 * @method     ChildLibri[]|ObjectCollection findByIdgenere1(int $IDgenere1) Return ChildLibri objects filtered by the IDgenere1 column
 * @method     ChildLibri[]|ObjectCollection findByTipo2(int $tipo2) Return ChildLibri objects filtered by the tipo2 column
 * @method     ChildLibri[]|ObjectCollection findByIdgenere2(int $IDgenere2) Return ChildLibri objects filtered by the IDgenere2 column
 * @method     ChildLibri[]|ObjectCollection findByTipo3(int $tipo3) Return ChildLibri objects filtered by the tipo3 column
 * @method     ChildLibri[]|ObjectCollection findByIdgenere3(int $IDgenere3) Return ChildLibri objects filtered by the IDgenere3 column
 * @method     ChildLibri[]|ObjectCollection findByEditore(string $editore) Return ChildLibri objects filtered by the editore column
 * @method     ChildLibri[]|ObjectCollection findByDatiTecnici(string $dati_tecnici) Return ChildLibri objects filtered by the dati_tecnici column
 * @method     ChildLibri[]|ObjectCollection findByDirittiControllati(string $diritti_controllati) Return ChildLibri objects filtered by the diritti_controllati column
 * @method     ChildLibri[]|ObjectCollection findByDirittiConcessi(string $diritti_concessi) Return ChildLibri objects filtered by the diritti_concessi column
 * @method     ChildLibri[]|ObjectCollection findByDescrizioneBreve(string $descrizione_breve) Return ChildLibri objects filtered by the descrizione_breve column
 * @method     ChildLibri[]|ObjectCollection findByDescrizione(string $descrizione) Return ChildLibri objects filtered by the descrizione column
 * @method     ChildLibri[]|ObjectCollection findByPdf1Ita(string $pdf1_ita) Return ChildLibri objects filtered by the pdf1_ita column
 * @method     ChildLibri[]|ObjectCollection findByPdf1Eng(string $pdf1_eng) Return ChildLibri objects filtered by the pdf1_eng column
 * @method     ChildLibri[]|ObjectCollection findByPdf1Deu(string $pdf1_deu) Return ChildLibri objects filtered by the pdf1_deu column
 * @method     ChildLibri[]|ObjectCollection findByPdf1Fra(string $pdf1_fra) Return ChildLibri objects filtered by the pdf1_fra column
 * @method     ChildLibri[]|ObjectCollection findByPdf1Esp(string $pdf1_esp) Return ChildLibri objects filtered by the pdf1_esp column
 * @method     ChildLibri[]|ObjectCollection findByPdf2(string $pdf2) Return ChildLibri objects filtered by the pdf2 column
 * @method     ChildLibri[]|ObjectCollection findByPdf3(string $pdf3) Return ChildLibri objects filtered by the pdf3 column
 * @method     ChildLibri[]|ObjectCollection findByPdf4(string $pdf4) Return ChildLibri objects filtered by the pdf4 column
 * @method     ChildLibri[]|ObjectCollection findByImgSmall(string $img_small) Return ChildLibri objects filtered by the img_small column
 * @method     ChildLibri[]|ObjectCollection findByImgBig(string $img_big) Return ChildLibri objects filtered by the img_big column
 * @method     ChildLibri[]|ObjectCollection findByVetrina(string $vetrina) Return ChildLibri objects filtered by the vetrina column
 * @method     ChildLibri[]|ObjectCollection findByOrdine(int $ordine) Return ChildLibri objects filtered by the ordine column
 * @method     ChildLibri[]|ObjectCollection findByVetrinacat(string $vetrinacat) Return ChildLibri objects filtered by the vetrinacat column
 * @method     ChildLibri[]|ObjectCollection findByOrdinecat(int $ordinecat) Return ChildLibri objects filtered by the ordinecat column
 * @method     ChildLibri[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LibriQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LibriQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Libri', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLibriQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLibriQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLibriQuery) {
            return $criteria;
        }
        $query = new ChildLibriQuery();
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
     * @return ChildLibri|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LibriTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LibriTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLibri A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, titolo, autore1, autore2, autore3, tipo1, IDgenere1, tipo2, IDgenere2, tipo3, IDgenere3, editore, dati_tecnici, diritti_controllati, diritti_concessi, descrizione_breve, descrizione, pdf1_ita, pdf1_eng, pdf1_deu, pdf1_fra, pdf1_esp, pdf2, pdf3, pdf4, img_small, img_big, vetrina, ordine, vetrinacat, ordinecat FROM libri WHERE ID = :p0';
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
            /** @var ChildLibri $obj */
            $obj = new ChildLibri();
            $obj->hydrate($row);
            LibriTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLibri|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LibriTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LibriTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByTitolo($titolo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titolo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_TITOLO, $titolo, $comparison);
    }

    /**
     * Filter the query on the autore1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAutore1(1234); // WHERE autore1 = 1234
     * $query->filterByAutore1(array(12, 34)); // WHERE autore1 IN (12, 34)
     * $query->filterByAutore1(array('min' => 12)); // WHERE autore1 > 12
     * </code>
     *
     * @param     mixed $autore1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByAutore1($autore1 = null, $comparison = null)
    {
        if (is_array($autore1)) {
            $useMinMax = false;
            if (isset($autore1['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_AUTORE1, $autore1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($autore1['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_AUTORE1, $autore1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_AUTORE1, $autore1, $comparison);
    }

    /**
     * Filter the query on the autore2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAutore2(1234); // WHERE autore2 = 1234
     * $query->filterByAutore2(array(12, 34)); // WHERE autore2 IN (12, 34)
     * $query->filterByAutore2(array('min' => 12)); // WHERE autore2 > 12
     * </code>
     *
     * @param     mixed $autore2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByAutore2($autore2 = null, $comparison = null)
    {
        if (is_array($autore2)) {
            $useMinMax = false;
            if (isset($autore2['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_AUTORE2, $autore2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($autore2['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_AUTORE2, $autore2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_AUTORE2, $autore2, $comparison);
    }

    /**
     * Filter the query on the autore3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAutore3(1234); // WHERE autore3 = 1234
     * $query->filterByAutore3(array(12, 34)); // WHERE autore3 IN (12, 34)
     * $query->filterByAutore3(array('min' => 12)); // WHERE autore3 > 12
     * </code>
     *
     * @param     mixed $autore3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByAutore3($autore3 = null, $comparison = null)
    {
        if (is_array($autore3)) {
            $useMinMax = false;
            if (isset($autore3['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_AUTORE3, $autore3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($autore3['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_AUTORE3, $autore3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_AUTORE3, $autore3, $comparison);
    }

    /**
     * Filter the query on the tipo1 column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo1(1234); // WHERE tipo1 = 1234
     * $query->filterByTipo1(array(12, 34)); // WHERE tipo1 IN (12, 34)
     * $query->filterByTipo1(array('min' => 12)); // WHERE tipo1 > 12
     * </code>
     *
     * @param     mixed $tipo1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByTipo1($tipo1 = null, $comparison = null)
    {
        if (is_array($tipo1)) {
            $useMinMax = false;
            if (isset($tipo1['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_TIPO1, $tipo1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipo1['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_TIPO1, $tipo1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_TIPO1, $tipo1, $comparison);
    }

    /**
     * Filter the query on the IDgenere1 column
     *
     * Example usage:
     * <code>
     * $query->filterByIdgenere1(1234); // WHERE IDgenere1 = 1234
     * $query->filterByIdgenere1(array(12, 34)); // WHERE IDgenere1 IN (12, 34)
     * $query->filterByIdgenere1(array('min' => 12)); // WHERE IDgenere1 > 12
     * </code>
     *
     * @param     mixed $idgenere1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByIdgenere1($idgenere1 = null, $comparison = null)
    {
        if (is_array($idgenere1)) {
            $useMinMax = false;
            if (isset($idgenere1['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_IDGENERE1, $idgenere1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idgenere1['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_IDGENERE1, $idgenere1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_IDGENERE1, $idgenere1, $comparison);
    }

    /**
     * Filter the query on the tipo2 column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo2(1234); // WHERE tipo2 = 1234
     * $query->filterByTipo2(array(12, 34)); // WHERE tipo2 IN (12, 34)
     * $query->filterByTipo2(array('min' => 12)); // WHERE tipo2 > 12
     * </code>
     *
     * @param     mixed $tipo2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByTipo2($tipo2 = null, $comparison = null)
    {
        if (is_array($tipo2)) {
            $useMinMax = false;
            if (isset($tipo2['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_TIPO2, $tipo2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipo2['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_TIPO2, $tipo2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_TIPO2, $tipo2, $comparison);
    }

    /**
     * Filter the query on the IDgenere2 column
     *
     * Example usage:
     * <code>
     * $query->filterByIdgenere2(1234); // WHERE IDgenere2 = 1234
     * $query->filterByIdgenere2(array(12, 34)); // WHERE IDgenere2 IN (12, 34)
     * $query->filterByIdgenere2(array('min' => 12)); // WHERE IDgenere2 > 12
     * </code>
     *
     * @param     mixed $idgenere2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByIdgenere2($idgenere2 = null, $comparison = null)
    {
        if (is_array($idgenere2)) {
            $useMinMax = false;
            if (isset($idgenere2['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_IDGENERE2, $idgenere2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idgenere2['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_IDGENERE2, $idgenere2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_IDGENERE2, $idgenere2, $comparison);
    }

    /**
     * Filter the query on the tipo3 column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo3(1234); // WHERE tipo3 = 1234
     * $query->filterByTipo3(array(12, 34)); // WHERE tipo3 IN (12, 34)
     * $query->filterByTipo3(array('min' => 12)); // WHERE tipo3 > 12
     * </code>
     *
     * @param     mixed $tipo3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByTipo3($tipo3 = null, $comparison = null)
    {
        if (is_array($tipo3)) {
            $useMinMax = false;
            if (isset($tipo3['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_TIPO3, $tipo3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipo3['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_TIPO3, $tipo3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_TIPO3, $tipo3, $comparison);
    }

    /**
     * Filter the query on the IDgenere3 column
     *
     * Example usage:
     * <code>
     * $query->filterByIdgenere3(1234); // WHERE IDgenere3 = 1234
     * $query->filterByIdgenere3(array(12, 34)); // WHERE IDgenere3 IN (12, 34)
     * $query->filterByIdgenere3(array('min' => 12)); // WHERE IDgenere3 > 12
     * </code>
     *
     * @param     mixed $idgenere3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByIdgenere3($idgenere3 = null, $comparison = null)
    {
        if (is_array($idgenere3)) {
            $useMinMax = false;
            if (isset($idgenere3['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_IDGENERE3, $idgenere3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idgenere3['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_IDGENERE3, $idgenere3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_IDGENERE3, $idgenere3, $comparison);
    }

    /**
     * Filter the query on the editore column
     *
     * Example usage:
     * <code>
     * $query->filterByEditore('fooValue');   // WHERE editore = 'fooValue'
     * $query->filterByEditore('%fooValue%', Criteria::LIKE); // WHERE editore LIKE '%fooValue%'
     * </code>
     *
     * @param     string $editore The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByEditore($editore = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($editore)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_EDITORE, $editore, $comparison);
    }

    /**
     * Filter the query on the dati_tecnici column
     *
     * Example usage:
     * <code>
     * $query->filterByDatiTecnici('fooValue');   // WHERE dati_tecnici = 'fooValue'
     * $query->filterByDatiTecnici('%fooValue%', Criteria::LIKE); // WHERE dati_tecnici LIKE '%fooValue%'
     * </code>
     *
     * @param     string $datiTecnici The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByDatiTecnici($datiTecnici = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($datiTecnici)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_DATI_TECNICI, $datiTecnici, $comparison);
    }

    /**
     * Filter the query on the diritti_controllati column
     *
     * Example usage:
     * <code>
     * $query->filterByDirittiControllati('fooValue');   // WHERE diritti_controllati = 'fooValue'
     * $query->filterByDirittiControllati('%fooValue%', Criteria::LIKE); // WHERE diritti_controllati LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dirittiControllati The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByDirittiControllati($dirittiControllati = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dirittiControllati)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_DIRITTI_CONTROLLATI, $dirittiControllati, $comparison);
    }

    /**
     * Filter the query on the diritti_concessi column
     *
     * Example usage:
     * <code>
     * $query->filterByDirittiConcessi('fooValue');   // WHERE diritti_concessi = 'fooValue'
     * $query->filterByDirittiConcessi('%fooValue%', Criteria::LIKE); // WHERE diritti_concessi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dirittiConcessi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByDirittiConcessi($dirittiConcessi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dirittiConcessi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_DIRITTI_CONCESSI, $dirittiConcessi, $comparison);
    }

    /**
     * Filter the query on the descrizione_breve column
     *
     * Example usage:
     * <code>
     * $query->filterByDescrizioneBreve('fooValue');   // WHERE descrizione_breve = 'fooValue'
     * $query->filterByDescrizioneBreve('%fooValue%', Criteria::LIKE); // WHERE descrizione_breve LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descrizioneBreve The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByDescrizioneBreve($descrizioneBreve = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descrizioneBreve)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_DESCRIZIONE_BREVE, $descrizioneBreve, $comparison);
    }

    /**
     * Filter the query on the descrizione column
     *
     * Example usage:
     * <code>
     * $query->filterByDescrizione('fooValue');   // WHERE descrizione = 'fooValue'
     * $query->filterByDescrizione('%fooValue%', Criteria::LIKE); // WHERE descrizione LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descrizione The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByDescrizione($descrizione = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descrizione)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_DESCRIZIONE, $descrizione, $comparison);
    }

    /**
     * Filter the query on the pdf1_ita column
     *
     * Example usage:
     * <code>
     * $query->filterByPdf1Ita('fooValue');   // WHERE pdf1_ita = 'fooValue'
     * $query->filterByPdf1Ita('%fooValue%', Criteria::LIKE); // WHERE pdf1_ita LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdf1Ita The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPdf1Ita($pdf1Ita = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdf1Ita)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_PDF1_ITA, $pdf1Ita, $comparison);
    }

    /**
     * Filter the query on the pdf1_eng column
     *
     * Example usage:
     * <code>
     * $query->filterByPdf1Eng('fooValue');   // WHERE pdf1_eng = 'fooValue'
     * $query->filterByPdf1Eng('%fooValue%', Criteria::LIKE); // WHERE pdf1_eng LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdf1Eng The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPdf1Eng($pdf1Eng = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdf1Eng)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_PDF1_ENG, $pdf1Eng, $comparison);
    }

    /**
     * Filter the query on the pdf1_deu column
     *
     * Example usage:
     * <code>
     * $query->filterByPdf1Deu('fooValue');   // WHERE pdf1_deu = 'fooValue'
     * $query->filterByPdf1Deu('%fooValue%', Criteria::LIKE); // WHERE pdf1_deu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdf1Deu The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPdf1Deu($pdf1Deu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdf1Deu)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_PDF1_DEU, $pdf1Deu, $comparison);
    }

    /**
     * Filter the query on the pdf1_fra column
     *
     * Example usage:
     * <code>
     * $query->filterByPdf1Fra('fooValue');   // WHERE pdf1_fra = 'fooValue'
     * $query->filterByPdf1Fra('%fooValue%', Criteria::LIKE); // WHERE pdf1_fra LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdf1Fra The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPdf1Fra($pdf1Fra = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdf1Fra)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_PDF1_FRA, $pdf1Fra, $comparison);
    }

    /**
     * Filter the query on the pdf1_esp column
     *
     * Example usage:
     * <code>
     * $query->filterByPdf1Esp('fooValue');   // WHERE pdf1_esp = 'fooValue'
     * $query->filterByPdf1Esp('%fooValue%', Criteria::LIKE); // WHERE pdf1_esp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdf1Esp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPdf1Esp($pdf1Esp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdf1Esp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_PDF1_ESP, $pdf1Esp, $comparison);
    }

    /**
     * Filter the query on the pdf2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPdf2('fooValue');   // WHERE pdf2 = 'fooValue'
     * $query->filterByPdf2('%fooValue%', Criteria::LIKE); // WHERE pdf2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdf2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPdf2($pdf2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdf2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_PDF2, $pdf2, $comparison);
    }

    /**
     * Filter the query on the pdf3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPdf3('fooValue');   // WHERE pdf3 = 'fooValue'
     * $query->filterByPdf3('%fooValue%', Criteria::LIKE); // WHERE pdf3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdf3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPdf3($pdf3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdf3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_PDF3, $pdf3, $comparison);
    }

    /**
     * Filter the query on the pdf4 column
     *
     * Example usage:
     * <code>
     * $query->filterByPdf4('fooValue');   // WHERE pdf4 = 'fooValue'
     * $query->filterByPdf4('%fooValue%', Criteria::LIKE); // WHERE pdf4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdf4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByPdf4($pdf4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdf4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_PDF4, $pdf4, $comparison);
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
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByImgSmall($imgSmall = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imgSmall)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_IMG_SMALL, $imgSmall, $comparison);
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
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByImgBig($imgBig = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imgBig)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_IMG_BIG, $imgBig, $comparison);
    }

    /**
     * Filter the query on the vetrina column
     *
     * Example usage:
     * <code>
     * $query->filterByVetrina('fooValue');   // WHERE vetrina = 'fooValue'
     * $query->filterByVetrina('%fooValue%', Criteria::LIKE); // WHERE vetrina LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vetrina The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByVetrina($vetrina = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vetrina)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_VETRINA, $vetrina, $comparison);
    }

    /**
     * Filter the query on the ordine column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdine(1234); // WHERE ordine = 1234
     * $query->filterByOrdine(array(12, 34)); // WHERE ordine IN (12, 34)
     * $query->filterByOrdine(array('min' => 12)); // WHERE ordine > 12
     * </code>
     *
     * @param     mixed $ordine The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByOrdine($ordine = null, $comparison = null)
    {
        if (is_array($ordine)) {
            $useMinMax = false;
            if (isset($ordine['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_ORDINE, $ordine['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ordine['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_ORDINE, $ordine['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_ORDINE, $ordine, $comparison);
    }

    /**
     * Filter the query on the vetrinacat column
     *
     * Example usage:
     * <code>
     * $query->filterByVetrinacat('fooValue');   // WHERE vetrinacat = 'fooValue'
     * $query->filterByVetrinacat('%fooValue%', Criteria::LIKE); // WHERE vetrinacat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vetrinacat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByVetrinacat($vetrinacat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vetrinacat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_VETRINACAT, $vetrinacat, $comparison);
    }

    /**
     * Filter the query on the ordinecat column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdinecat(1234); // WHERE ordinecat = 1234
     * $query->filterByOrdinecat(array(12, 34)); // WHERE ordinecat IN (12, 34)
     * $query->filterByOrdinecat(array('min' => 12)); // WHERE ordinecat > 12
     * </code>
     *
     * @param     mixed $ordinecat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function filterByOrdinecat($ordinecat = null, $comparison = null)
    {
        if (is_array($ordinecat)) {
            $useMinMax = false;
            if (isset($ordinecat['min'])) {
                $this->addUsingAlias(LibriTableMap::COL_ORDINECAT, $ordinecat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ordinecat['max'])) {
                $this->addUsingAlias(LibriTableMap::COL_ORDINECAT, $ordinecat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LibriTableMap::COL_ORDINECAT, $ordinecat, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLibri $libri Object to remove from the list of results
     *
     * @return $this|ChildLibriQuery The current query, for fluid interface
     */
    public function prune($libri = null)
    {
        if ($libri) {
            $this->addUsingAlias(LibriTableMap::COL_ID, $libri->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the libri table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LibriTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LibriTableMap::clearInstancePool();
            LibriTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LibriTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LibriTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LibriTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LibriTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LibriQuery
