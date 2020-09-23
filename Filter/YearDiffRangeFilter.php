<?php

declare(strict_types=1);

namespace HoPeter1018\SonataAdminHelperBundle\Filter;

class YearDiffRangeFilter extends NumberRangeFilter
{
    public static function getField($alias, $field)
    {
        return sprintf('TIMESTAMPDIFF(YEAR, %s.%s, CURRENT_DATE())', $alias, $field);
    }
}
