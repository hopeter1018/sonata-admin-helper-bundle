<?php

declare(strict_types=1);

namespace EasternColor\CoreBundle\Filter;

class YearDiffRangeFilter extends NumberRangeFilter
{
    public static function getField($alias, $field)
    {
        return sprintf('TIMESTAMPDIFF(YEAR, %s.%s, CURRENT_DATE())', $alias, $field);
    }
}
