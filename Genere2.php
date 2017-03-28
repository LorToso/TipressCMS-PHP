<?php

use Base\Genere2 as BaseGenere2;

/**
 * Skeleton subclass for representing a row from the 'genere2' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Genere2 extends BaseGenere2
{
    public function getDescriptor()
    {
        return $this->getNomeUniq();
    }
}
